<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use App\Models\Pengguna;
use App\Models\PengaduanTracking;
use App\Models\ChatPengaduan;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'kode',
        'no_sa',
        'nama',
        'no_hp',
        'alamat_lengkap',
        'email',
        'latitude',
        'longitude',
        'share_lokasi',
        'ket',
        'tingkat_masalah',
        'lokasi_daerah_cabang',
        'status',
        'foto',
        'id_kategori',
        'petugas_id',
    ];

    protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /* =========================
     * 🔹 RELASI KE KATEGORI
     * ========================= */
    public function kategori()
    {
        return $this->belongsTo(
            Kategori::class,
            'id_kategori',
            'id_kategori'
        );
    }

    /* =========================
     * 🔹 RELASI KE PETUGAS (PENGGUNA)
     * ========================= */
    public function petugas()
    {
        return $this->belongsTo(
            Pengguna::class,
            'petugas_id',
            'id_pengguna'
        );
    }

    /* =========================
     * 🔹 RELASI KE TRACKING
     * ========================= */
    public function trackings()
    {
        return $this->hasMany(
            PengaduanTracking::class,
            'pengaduan_id',
            'id'
        )->orderBy('created_at', 'desc');
    }

    /* =========================
     * 🔹 RELASI KE CHAT
     * ========================= */
    public function chats()
    {
        return $this->hasMany(
            ChatPengaduan::class,
            'pengaduan_id',
            'id'
        );
    }

    /* =========================
     * 🔹 SCOPE: Pengaduan dengan Koordinat Valid
     * ========================= */
    public function scopeWithLocation($query)
    {
        return $query->whereNotNull('latitude')
                     ->whereNotNull('longitude');
    }

    /* =========================
 * 🔹 SCOPE: Pengaduan Periode Tertentu
 * ========================= */
public function scopeLastDays($query, $days = 30)
{
    return $query->where('pengaduans.created_at', '>=', now()->subDays($days)); // ✅ Tambahkan prefix tabel
}

    /* =========================
     * 🔹 SCOPE: Filter Berdasarkan Cabang
     * ========================= */
    public function scopeCabang($query, $cabang)
    {
        return $query->where('lokasi_daerah_cabang', $cabang);
    }

    /* =========================
     * 🔹 SCOPE: Filter Berdasarkan Status
     * ========================= */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /* =========================
     * 🔹 METHOD: Hitung Waktu Respons (jam)
     * ========================= */
    public function getWaktuResponsAttribute()
    {
        $trackingProses = $this->trackings()
            ->where('status', 'proses')
            ->orderBy('created_at')
            ->first();

        if (!$trackingProses) {
            return null;
        }

        return $this->created_at->diffInHours($trackingProses->created_at);
    }

    /* =========================
     * 🔹 METHOD: Apakah Melewati SLA (24 jam)
     * ========================= */
    public function getMelewatiSlaAttribute()
    {
        $waktuRespons = $this->waktu_respons;
        return $waktuRespons !== null && $waktuRespons > 24;
    }

    /* =========================
     * 🔹 METHOD: Ekstrak Koordinat dari share_lokasi
     * ========================= */
    public function getKoordinatAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return [
                'lat' => (float) $this->latitude,
                'lng' => (float) $this->longitude
            ];
        }

        // Ekstrak dari share_lokasi jika ada
        if ($this->share_lokasi) {
            if (preg_match('/q=(-?\d+\.\d+),(-?\d+\.\d+)/', $this->share_lokasi, $matches)) {
                return [
                    'lat' => (float) $matches[1],
                    'lng' => (float) $matches[2]
                ];
            }
        }

        return null;
    }

    /* =========================
 * 🔹 METHOD: Hitung Intensitas untuk Heatmap
 * ========================= */
public static function getHeatmapData($days = 30, $minIntensity = 1)
{
    return self::withLocation()
        ->lastDays($days)
        ->select(
            'pengaduans.latitude',
            'pengaduans.longitude',
            'pengaduans.lokasi_daerah_cabang',
            'pengaduans.tingkat_masalah',
            DB::raw('COUNT(*) as intensity'),
            DB::raw('AVG(TIMESTAMPDIFF(HOUR, pengaduans.created_at, pengaduan_trackings.created_at)) as avg_response_time')
        )
        ->leftJoin('pengaduan_trackings', function ($join) {
            $join->on('pengaduans.id', '=', 'pengaduan_trackings.pengaduan_id')
                 ->where('pengaduan_trackings.status', '=', 'proses');
        })
        ->groupBy('pengaduans.latitude', 'pengaduans.longitude', 'pengaduans.lokasi_daerah_cabang', 'pengaduans.tingkat_masalah')
        ->having('intensity', '>=', $minIntensity)
        ->get()
        ->map(function ($item) {
            return [
                'lat' => (float) $item->latitude,
                'lng' => (float) $item->longitude,
                'intensity' => (int) $item->intensity,
                'cabang' => $item->lokasi_daerah_cabang,
                'tingkat_masalah' => $item->tingkat_masalah,
                'avg_response_time' => round($item->avg_response_time, 1),
                'weight' => self::calculateWeight($item)
            ];
        });
}

    /* =========================
     * 🔹 METHOD: Hitung Bobot untuk Heatmap
     * ========================= */
    private function calculateWeight($item)
    {
        $weight = $item->intensity;

        // Tambah bobot untuk masalah besar
        if ($item->tingkat_masalah === 'besar') {
            $weight *= 1.5;
        } elseif ($item->tingkat_masalah === 'sedang') {
            $weight *= 1.2;
        }

        // Kurangi bobot jika respons cepat
        if ($item->avg_response_time && $item->avg_response_time < 12) {
            $weight *= 0.8;
        }

        return $weight;
    }

    /* =========================
 * 🔹 METHOD: Statistik Kinerja Petugas
 * ========================= */
public static function getKinerjaPetugas($petugasId = null)
{
    $query = self::join('pengaduan_trackings as pt', 'pengaduans.id', '=', 'pt.pengaduan_id')
        ->join(DB::raw('(
            SELECT pengaduan_id, MAX(id) as max_id
            FROM pengaduan_trackings
            GROUP BY pengaduan_id
        ) as latest'), function ($join) {
            $join->on('pt.pengaduan_id', '=', 'latest.pengaduan_id')
                 ->on('pt.id', '=', 'latest.max_id');
        })
        ->select(
            'pt.petugas_id',  // ✅ Gunakan petugas_id dari tracking
            DB::raw('COUNT(*) as total_laporan'),
            DB::raw('SUM(CASE WHEN pengaduans.status = "selesai" THEN 1 ELSE 0 END) as selesai'),
            DB::raw('SUM(CASE WHEN pengaduans.status = "proses" THEN 1 ELSE 0 END) as proses'),
            DB::raw('AVG(TIMESTAMPDIFF(HOUR, pengaduans.created_at, pt.created_at)) as avg_respons'),
            DB::raw('SUM(CASE WHEN TIMESTAMPDIFF(HOUR, pengaduans.created_at, pt.created_at) <= 24 THEN 1 ELSE 0 END) * 100.0 / COUNT(*) as persen_sla')
        )
        ->whereNotNull('pt.petugas_id')
        ->groupBy('pt.petugas_id');

    if ($petugasId) {
        $query->where('pt.petugas_id', $petugasId);
    }

    return $query->get();
}

    /* =========================
     * 🔹 METHOD: Early Warning - Laporan Tertunda
     * ========================= */
    public static function getEarlyWarnings()
    {
        $warnings = [];

        // Warning 1: Laporan menunggu > 6 jam
        $tertunda = self::where('status', 'menunggu')
            ->where('created_at', '<', now()->subHours(6))
            ->withLocation()
            ->get()
            ->groupBy(function ($p) {
                return round($p->latitude, 3) . ',' . round($p->longitude, 3);
            })
            ->filter(fn($group) => $group->count() >= 3);

        foreach ($tertunda as $lokasi => $group) {
            $first = $group->first();
            $warnings[] = [
                'type' => 'hotspot_tertunda',
                'message' => "Area ini butuh perhatian: {$group->count()} laporan tertunda >6 jam",
                'lat' => (float) $first->latitude,
                'lng' => (float) $first->longitude,
                'count' => $group->count(),
                'cabang' => $first->lokasi_daerah_cabang
            ];
        }

        // Warning 2: Waktu respons lambat
        $lambat = self::join('pengaduan_trackings as pt', function ($join) {
                $join->on('pengaduans.id', '=', 'pt.pengaduan_id')
                     ->where('pt.status', '=', 'proses');
            })
            ->where('pengaduans.status', '!=', 'selesai')
            ->whereRaw('TIMESTAMPDIFF(HOUR, pengaduans.created_at, pt.created_at) > 24')
            ->select('pengaduans.*', 'pt.created_at as proses_at')
            ->get();

        foreach ($lambat as $item) {
            $warnings[] = [
                'type' => 'respons_lambat',
                'message' => "Laporan #{$item->kode} melewati SLA ({$item->created_at->diffInHours(now())} jam)",
                'lat' => (float) $item->latitude,
                'lng' => (float) $item->longitude,
                'kode' => $item->kode,
                'jam' => $item->created_at->diffInHours(now())
            ];
        }

        return $warnings;
    }

    /* =========================
 * 🔹 METHOD: Rekomendasi Infrastruktur (FIXED)
 * ========================= */
public static function getRekomendasiInfrastruktur($days = 60)
{
    $result = self::withLocation()
        ->lastDays($days)
        ->where('tingkat_masalah', 'besar')
        ->select(
            'lokasi_daerah_cabang',
            DB::raw('COUNT(*) as total_laporan'),
            DB::raw('COUNT(CASE WHEN status = "selesai" THEN 1 END) as selesai'),
            DB::raw('AVG(latitude) as avg_lat'),
            DB::raw('AVG(longitude) as avg_lng'),
            DB::raw('GROUP_CONCAT(DISTINCT ket SEPARATOR " | ") as masalah_umum')
        )
        ->groupBy('lokasi_daerah_cabang')
        ->having('total_laporan', '>=', 3)
        ->get();

    // ✅ Return empty collection jika tidak ada data
    if ($result->isEmpty()) {
        return collect([]);
    }

    return $result->map(function ($item) {
        $prioritas = 'rendah';
        if ($item->total_laporan >= 10) {
            $prioritas = 'tinggi';
        } elseif ($item->total_laporan >= 5) {
            $prioritas = 'sedang';
        }
        
        return [
            'cabang' => $item->lokasi_daerah_cabang ?? 'unknown',
            'total' => $item->total_laporan,
            'selesai' => $item->selesai,
            'persen_selesai' => $item->total_laporan > 0 
                ? round(($item->selesai / $item->total_laporan) * 100, 1) 
                : 0,
            'lat' => (float) ($item->avg_lat ?? 0),
            'lng' => (float) ($item->avg_lng ?? 0),
            'masalah_umum' => $item->masalah_umum ?? 'Tidak ada data',
            'rekomendasi' => "Prioritas perbaikan infrastruktur di {$item->lokasi_daerah_cabang} ({$item->total_laporan} laporan kritis)",
            'prioritas' => $prioritas
        ];
    });
}


}
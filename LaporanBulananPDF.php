<?php
namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanBulananPDF
{
    protected $bulan;
    protected $tahun;
    protected $cabang;
    protected $kategori;

    public function __construct($bulan, $tahun, $cabang = 'all', $kategori = 'all')
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->cabang = $cabang;
        $this->kategori = $kategori;
    }

    public function download()
    {
        $bulanList = ['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'];
        $cabangList = ['all' => 'Semua Cabang', 'cabang1' => 'Cabang 1', 'cabang2' => 'Cabang 2', 'cabang3' => 'Cabang 3', 'cabang4' => 'Cabang 4', 'pusat_bhayangkara' => 'Pusat Bhayangkara'];
        $kategoriList = ['all' => 'Semua Kategori', 'kecil' => 'Masalah Kecil', 'sedang' => 'Masalah Sedang', 'besar' => 'Masalah Besar'];

        // Query dengan filter
        $query = DB::table('pengaduans')
            ->select(
                'lokasi_daerah_cabang as cabang',
                DB::raw('COUNT(*) as total'),
                DB::raw('SUM(CASE WHEN status = "selesai" THEN 1 ELSE 0 END) as selesai'),
                DB::raw('SUM(CASE WHEN status = "proses" THEN 1 ELSE 0 END) as proses'),
                DB::raw('SUM(CASE WHEN status = "menunggu" THEN 1 ELSE 0 END) as menunggu')
            )
            ->whereYear('created_at', $this->tahun)
            ->whereMonth('created_at', $this->bulan);

        if ($this->cabang !== 'all') {
            $query->where('lokasi_daerah_cabang', $this->cabang);
        }

        if ($this->kategori !== 'all') {
            $query->where('tingkat_masalah', $this->kategori);
        }

        $data = $query->groupBy('lokasi_daerah_cabang')
            ->orderBy('total', 'desc')
            ->get();

        // Hitung summary
        $summaryQuery = DB::table('pengaduans')
            ->whereYear('created_at', $this->tahun)
            ->whereMonth('created_at', $this->bulan);
        
        if ($this->cabang !== 'all') $summaryQuery->where('lokasi_daerah_cabang', $this->cabang);
        if ($this->kategori !== 'all') $summaryQuery->where('tingkat_masalah', $this->kategori);
        
        $totalPelaporan = $summaryQuery->count();
        $selesai = $summaryQuery->where('status', 'selesai')->count();
        $proses = $summaryQuery->where('status', 'proses')->count();
        $totalDitangani = $selesai + $proses;
        $persenSelesai = $totalDitangani ? round(($selesai / $totalDitangani) * 100, 1) : 0;

        $pdf = Pdf::loadView('exports.laporan-bulanan-pdf', [
            'data' => $data,
            'bulan' => $bulanList[$this->bulan],
            'tahun' => $this->tahun,
            'cabang' => $this->cabang !== 'all' ? $cabangList[$this->cabang] : 'Semua Cabang',
            'kategori' => $this->kategori !== 'all' ? $kategoriList[$this->kategori] : 'Semua Kategori',
            'totalPelaporan' => $totalPelaporan,
            'persenSelesai' => $persenSelesai,
            'tanggalCetak' => now()->format('d F Y H:i')
        ]);

        $filename = "Laporan_Bulanan_{$this->bulan}_{$this->tahun}";
        if ($this->cabang !== 'all') $filename .= "_{$this->cabang}";
        if ($this->kategori !== 'all') $filename .= "_{$this->kategori}";

        return $pdf->download("{$filename}.pdf");
    }
}
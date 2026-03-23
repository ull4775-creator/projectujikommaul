<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;

class LaporanBulananExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle, WithColumnWidths
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

    public function collection()
    {
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

        return $query->groupBy('lokasi_daerah_cabang')
            ->orderBy('total', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Cabang',
            'Total Pengaduan',
            'Selesai',
            'Proses',
            'Menunggu',
            'Persentase Selesai (%)'
        ];
    }

    public function map($row): array
    {
        $total = $row->proses + $row->selesai;
        $persen = $total > 0 ? round(($row->selesai / $total) * 100, 2) : 0;
        static $no = 0;
        $no++;
        return [
            $no,
            strtoupper($row->cabang),
            $row->total,
            $row->selesai,
            $row->proses,
            $row->menunggu,
            $persen
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'size' => 12, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['rgb' => '2563EB']],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 25,
            'C' => 18,
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'G' => 22,
        ];
    }

    public function title(): string
    {
        $bulanList = ['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'];
        $cabangList = ['all' => 'Semua Cabang', 'cabang1' => 'Cabang 1', 'cabang2' => 'Cabang 2', 'cabang3' => 'Cabang 3', 'cabang4' => 'Cabang 4', 'pusat_bhayangkara' => 'Pusat Bhayangkara'];
        $kategoriList = ['all' => 'Semua Kategori', 'kecil' => 'Masalah Kecil', 'sedang' => 'Masalah Sedang', 'besar' => 'Masalah Besar'];
        
        $judul = "Laporan {$bulanList[$this->bulan]} {$this->tahun}";
        if ($this->cabang !== 'all') $judul .= " - {$cabangList[$this->cabang]}";
        if ($this->kategori !== 'all') $judul .= " - {$kategoriList[$this->kategori]}";
        
        return $judul;
    }
}
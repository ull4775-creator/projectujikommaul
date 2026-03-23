<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use DB;

class LaporanBulananExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle
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

        return $query->groupBy('lokasi_daerah_cabang')->get();
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
            1 => ['font' => ['bold' => true, 'size' => 12]],
        ];
    }

    public function title(): string
    {
        return 'Laporan Bulanan';
    }
}
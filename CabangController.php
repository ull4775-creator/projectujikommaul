<?php

namespace App\Http\Controllers\Admin\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;

class CabangController extends Controller
{
    public function index($cabang)
{
    $cabang = strtolower($cabang);
    $cabang = str_replace(' ', '_', $cabang);

    $pengaduans = Pengaduan::where('lokasi_daerah_cabang', $cabang)->get();

    $bladeFile = match ($cabang) {
        'cabang1' => 'admin.pengaduan.cabang.cabang1',
        'cabang2' => 'admin.pengaduan.cabang.cabang2',
        'cabang3' => 'admin.pengaduan.cabang.cabang3',
        'cabang4' => 'admin.pengaduan.cabang.cabang4',
        'pusat_bhayangkara' => 'admin.pengaduan.cabang.pusat',
        default => abort(404),
    };

    return view($bladeFile, compact('pengaduans', 'cabang'));
}



}

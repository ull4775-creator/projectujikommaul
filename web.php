<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\FilterPengaduanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\Pengaduan\CabangController;
use App\Models\Pengaduan;
use App\Http\Controllers\Admin\LaporanBulananController;


/*
|--------------------------------------------------------------------------
| LANDING
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index'])->name('landing');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], '/register', fn () => redirect('/'));

/*
|--------------------------------------------------------------------------
| PENGADUAN PUBLIK
|--------------------------------------------------------------------------
*/
Route::get('/pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

/*
|--------------------------------------------------------------------------
| CEK STATUS (USER PUBLIK)
|--------------------------------------------------------------------------
*/
Route::get('/cek-status', [PengaduanController::class, 'showFormCekStatus'])->name('pengaduan.cek.form');
Route::post('/cek-status', [PengaduanController::class, 'postCekStatus'])->name('pengaduan.cek');
Route::post('/cek-status/{id}/chat', [PengaduanController::class, 'chatUser'])->name('pengaduan.chat.user');

/*
|--------------------------------------------------------------------------
| ADMIN & PETUGAS (AUTH)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    /* DASHBOARD */
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    /* PENGADUAN */
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/{id}', [PengaduanController::class, 'detail'])->name('pelaporan.detail');
    Route::post('/pengaduan/{id}/chat', [PengaduanController::class, 'chatAdmin'])->name('pengaduan.chat');
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    Route::put('/pengaduan/{id}/update-status', [PengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');

    /* CABANG */
    Route::get('/pengaduan/cabang/{cabang}', [CabangController::class, 'index'])->name('pengaduan.cabang');

    /* FILTER */
    Route::get('/pengaduan/filter', [FilterPengaduanController::class, 'index'])->name('pengaduan.filter');
    Route::get('/pengaduan/filter/pdf', [FilterPengaduanController::class, 'exportPdf'])->name('pengaduan.filter.pdf');

    /* KATEGORI - TINGKAT MASALAH */
    Route::get('/kategori', [AdminController::class, 'statistikKategori'])->name('kategori.index');
    Route::get('/kategori/{tingkat}', [AdminController::class, 'detailKategori'])->name('kategori.detail');


    Route::get('/admin/laporan/bulanan', [LaporanBulananController::class, 'index'])
    ->name('admin.laporan.bulanan')
    ->middleware(['auth']);



    /* PENGGUNA & ASPIRASI */
    Route::get('/admin/pengguna/{id}/profile', [PenggunaController::class, 'showProfile'])->name('pengguna.profile');
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('aspirasi', AspirasiController::class);

    /* EXPORT */
    Route::get('/pengaduan/{id}/pdf', [PengaduanController::class, 'pdf'])->name('pengaduan.pdf');
    Route::get('/pengaduan/{id}/excel', [PengaduanController::class, 'exportExcel'])->name('pengaduan.excel');

    /* CHAT */
    Route::get('/pengaduan/unread', [PengaduanController::class, 'unread'])->name('pengaduan.unread');

    /* DETAIL PETUGAS & CABANG */
    Route::get('/petugas/{id}', [AdminController::class, 'detailPetugas'])->name('petugas.detail');
    Route::get('/cabang/{cabangKey}', [AdminController::class, 'detailCabang'])->name('cabang.detail');
});

/*
|--------------------------------------------------------------------------
| HAPUS CHAT (USER)
|--------------------------------------------------------------------------
*/
Route::delete('/chat/{chat}', [PengaduanController::class, 'hapusChat'])->name('chat.delete');

/*
|--------------------------------------------------------------------------
| PETUGAS
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('petugas')->name('petugas.')->group(function () {
    Route::put('/pengaduan/{id}/update-status', [AdminController::class, 'updateStatus'])->name('pengaduan.updateStatus');
});

/*
|--------------------------------------------------------------------------
| ADMIN (ALIAS)
|--------------------------------------------------------------------------
*/
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| RESET PASSWORD
|--------------------------------------------------------------------------
*/
Route::put('/admin/pengguna/{id}/reset-password', [PenggunaController::class, 'resetPassword'])->name('admin.pengguna.reset-password');

/*
|--------------------------------------------------------------------------
| PETA PANAS & API
|--------------------------------------------------------------------------
*/
Route::get('/heatmap', function () {
    $data = Pengaduan::getHeatmapData(30);
    return response()->json($data);
});

Route::get('/warnings', function () {
    $warnings = Pengaduan::getEarlyWarnings();
    return response()->json($warnings);
});

Route::get('/rekomendasi', function () {
    $rekomendasi = Pengaduan::getRekomendasiInfrastruktur();
    return response()->json($rekomendasi);
});

/*
|--------------------------------------------------------------------------
| TEST EMAIL
|--------------------------------------------------------------------------
*/
Route::get('/test-email', function () {
    $pengaduan = \App\Models\Pengaduan::first();
    
    if (!$pengaduan) {
        return '<h2>❌ Tidak ada data pengaduan</h2><p>Silakan buat pengaduan terlebih dahulu.</p>';
    }

    if (empty($pengaduan->email)) {
        return "<h2>❌ Email pengaduan kosong</h2><p>Pengaduan ID: {$pengaduan->id}<br>Email: (kosong)<br><br>Silakan buat pengaduan baru dengan email terisi.</p>";
    }

    try {
        \Mail::to($pengaduan->email)->send(new \App\Mail\PengaduanSelesaiMail($pengaduan));
        
        return "
            <h2>✅ Email Berhasil Dikirim!</h2>
            <p><strong>Pengaduan ID:</strong> {$pengaduan->id}</p>
            <p><strong>Email Tujuan:</strong> {$pengaduan->email}</p>
            <p><strong>Status:</strong> Selesai</p>
        ";
    } catch (\Exception $e) {
        return "
            <h2>❌ Error Mengirim Email</h2>
            <p><strong>Pesan Error:</strong></p>
            <pre>{$e->getMessage()}</pre>
        ";
    }
})->name('test-email');


Route::get('/pengaduan/filter/pdf', [FilterPengaduanController::class, 'exportPdf'])
    ->name('admin.pengaduan.filter.pdf');
Route::get('/pengaduan/filter/excel', [FilterPengaduanController::class, 'exportExcel'])
    ->name('admin.pengaduan.filter.excel');


// Route laporan bulanan
Route::get('/laporan/bulanan', [LaporanBulananController::class, 'index'])->name('laporan.bulanan');
Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->name('admin.pengaduan.detail');
Route::get('/laporan/bulanan/pdf', [LaporanBulananController::class, 'exportPDF'])->name('laporan.bulanan.pdf');
Route::get('/laporan/bulanan/excel', [LaporanBulananController::class, 'exportExcel'])->name('laporan.bulanan.excel');

Route::get('/laporan/bulanan', [LaporanBulananController::class, 'index'])
    ->name('laporan.bulanan')
    ->middleware(['auth']);


    Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/laporan/bulanan', [AdminController::class, 'laporanBulanan'])->name('laporan.bulanan');
    Route::get('/admin/laporan/bulanan/pdf', [AdminController::class, 'exportPDF'])->name('laporan.bulanan.pdf');
    Route::get('/admin/laporan/bulanan/excel', [AdminController::class, 'exportExcel'])->name('laporan.bulanan.excel');
});




// API untuk data grafik dengan filter file kategori
Route::get('/api/grafik/filter', [AdminController::class, 'getGrafikFilter'])
    ->name('admin.grafik.filter');

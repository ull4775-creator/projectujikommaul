<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PengaduanController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// ---------------------------
// LOGIN & AUTH
// ---------------------------
Route::post('login', [AuthController::class, 'login']); 
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    // ---------------------------
    // PENGADUAN
    // ---------------------------
    Route::get('pengaduan', [PengaduanController::class, 'index']);
    Route::get('pengaduan/{id}', [PengaduanController::class, 'detail']);
    Route::post('pengaduan', [PengaduanController::class, 'store']);
    Route::put('pengaduan/{id}/update-status', [PengaduanController::class, 'updateStatus']);

    // ---------------------------
    // CHAT
    // ---------------------------
    Route::post('pengaduan/{id}/chat', [PengaduanController::class, 'chatUser']);
    Route::get('pengaduan/unread', [PengaduanController::class, 'unread']);
});

// peta panas 

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/heatmap', [AdminController::class, 'getHeatmapData']);
    Route::get('/warnings', [AdminController::class, 'getEarlyWarnings']);
    Route::get('/kinerja-petugas', [AdminController::class, 'getKinerjaPetugas']);
    Route::get('/rekomendasi-infrastruktur', [AdminController::class, 'getRekomendasiInfrastruktur']);
});

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

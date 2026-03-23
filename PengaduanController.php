<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    // LIST SEMUA PENGADUAN (role-based)
    public function index(Request $request)
    {
        $user = $request->user();

        $pengaduan = Pengaduan::when(!in_array($user->role, ['admin', 'petugas']), function($q) use ($user){
            $q->where('user_id', $user->id);
        })->get();

        return response()->json([
            'status' => 'success',
            'data' => $pengaduan
        ]);
    }

    // DETAIL PENGADUAN
    public function detail(Request $request, $id)
    {
        $pengaduan = Pengaduan::find($id);

        if (!$pengaduan) {
            return response()->json(['status' => 'error', 'message' => 'Not found'], 404);
        }

        // Cek hak akses user biasa
        if ($request->user()->role == 'user' && $pengaduan->user_id != $request->user()->id) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 403);
        }

        return response()->json(['status' => 'success', 'data' => $pengaduan]);
    }

    // CREATE PENGADUAN
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat_lengkap' => 'required|string',
            'kategori_id' => 'required|integer|exists:kategoris,id'
        ]);

        $data['user_id'] = $request->user()->id;

        $pengaduan = Pengaduan::create($data);

        return response()->json(['status' => 'success', 'data' => $pengaduan]);
    }

    // UPDATE STATUS (hanya admin/petugas)
    public function updateStatus(Request $request, $id)
    {
        $pengaduan = Pengaduan::find($id);

        if (!$pengaduan) {
            return response()->json(['status' => 'error', 'message' => 'Not found'], 404);
        }

        // Hanya admin/petugas yang bisa update status
        if (!in_array($request->user()->role, ['admin', 'petugas'])) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'status' => 'required|in:menunggu,proses,selesai'
        ]);

        $pengaduan->status = $request->status;
        $pengaduan->save();

        return response()->json(['status' => 'success', 'data' => $pengaduan]);
    }
}

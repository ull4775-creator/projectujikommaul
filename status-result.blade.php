@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">🔍 Cek Status Pengaduan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('cek.status.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_unik" class="form-label">Masukkan Kode Unik Pengaduan</label>
                            <input type="text" name="kode_unik" id="kode_unik" class="form-control" placeholder="Contoh: PDAM-20251115-001" required>
                            @error('kode_unik')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="card-body text-center">
    <h4 class="fw-bold mb-3">Kode Unik: {{ $tracking->kode_unik }}</h4>

    <!-- Informasi Tambahan -->
    <div class="row mt-4">
        <div class="col-md-6">
            <p><strong>Tingkat Masalah:</strong> 
                @if($tracking->pengaduan->tingkat_masalah == 'kecil')
                    <span class="badge bg-success">Kecil</span>
                @elseif($tracking->pengaduan->tingkat_masalah == 'sedang')
                    <span class="badge bg-warning text-dark">Sedang</span>
                @else
                    <span class="badge bg-danger">Besar</span>
                @endif
            </p>
        </div>
        <div class="col-md-6">
            <p><strong>Lokasi Cabang:</strong> 
                @switch($tracking->pengaduan->lokasi_daerah_cabang)
                    @case('cabang1')
                        <span class="badge bg-primary">Cabang 1</span>
                        @break
                    @case('cabang2')
                        <span class="badge bg-info">Cabang 2</span>
                        @break
                    @case('cabang3')
                        <span class="badge bg-secondary">Cabang 3</span>
                        @break
                    @case('cabang4')
                        <span class="badge bg-dark">Cabang 4</span>
                        @break
                    @case('pusat_bhayangkara')
                        <span class="badge bg-danger">Pusat Bhayangkara</span>
                        @break
                @endswitch
            </p>
        </div>
    </div>

    <!-- Status -->
    @if($tracking->status == 'baru')
        <div class="alert alert-warning mt-3">
            <i class="bi bi-clock-history me-2"></i> Status: <strong>Baru</strong><br>
            Pengaduan Anda sedang dalam antrian. Kami akan segera menindaklanjuti.
        </div>
    @elseif($tracking->status == 'proses')
        <div class="alert alert-info mt-3">
            <i class="bi bi-gear me-2"></i> Status: <strong>Dalam Proses</strong><br>
            Tim kami sedang menangani pengaduan Anda.
        </div>
    @else
        <div class="alert alert-success mt-3">
            <i class="bi bi-check-circle me-2"></i> Status: <strong>Selesai</strong><br>
            Pengaduan Anda telah ditangani. Terima kasih atas partisipasi Anda!
        </div>
    @endif

    <!-- Tombol -->
    <a href="{{ route('cek.status') }}" class="btn btn-outline-secondary mt-3">
        Cek Lagi
    </a>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3 ms-2">
        Kembali ke Beranda
    </a>
</div>
                        <button type="submit" class="btn btn-primary w-100">Cek Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
                    <form action="{{ route('pengaduan.cek') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_unik" class="form-label">Masukkan Kode Unik Pengaduan</label>
                            <input type="text" name="kode_unik" id="kode_unik" class="form-control" placeholder="Contoh: PDAM-20251115-001" required>
                            @error('kode_unik')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                            
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Cek Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

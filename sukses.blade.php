@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <h2 class="mb-3 text-success">Laporan Berhasil Dikirim!</h2>
    <p>Kode Pengaduan Anda:</p>
    <h3 class="fw-bold text-primary">{{ $kode }}</h3>
    <p class="mt-3">Simpan kode ini untuk mengecek status laporan Anda.</p>
    <a href="{{ url('/input/cek') }}" class="btn btn-outline-primary mt-3">Cek Status Pengaduan</a>
</div>
@endsection

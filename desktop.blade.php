@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between mb-4">
        <h4>Dashboard Admin</h4>
        <span class="text-muted">{{ now()->translatedFormat('l, d F Y') }}</span>
    </div>

    {{-- STAT CARDS --}}
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Total Pengaduan</h6>
                    <h3>{{ $totalPelaporan }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Selesai</h6>
                    <h3 class="text-success">{{ $selesai }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Proses</h6>
                    <h3 class="text-warning">{{ $proses }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Menunggu</h6>
                    <h3 class="text-danger">{{ $baru }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- GRAFIK --}}
    <div class="card mt-4">
        <div class="card-body">
            <h6>Grafik Pengaduan Bulanan</h6>
            <canvas id="laporanBulanan"></canvas>
        </div>
    </div>

</div>
@endsection

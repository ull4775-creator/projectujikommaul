@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Cek Status Laporan</h3>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('input.cek') }}">
                <div class="form-group">
                    <label for="kode">Masukkan Kode Laporan</label>
                    <input type="text" name="kode" class="form-control" placeholder="PDAM-XXXXXXX" required>
                </div>
                <button type="submit" class="btn btn-primary">Cek Status</button>
            </form>

            @if($laporan)
            <hr>
            <h5>Status Laporan:</h5>
            <ul>
                <li><strong>Kode:</strong> {{ $laporan->kode }}</li>
                <li><strong>Status:</strong> {{ $laporan->status }}</li>
                <li><strong>Keterangan:</strong> {{ $laporan->ket }}</li>
                <li><strong>Lokasi:</strong> {{ $laporan->lokasi }}</li>
            </ul>
            @elseif(request()->has('kode'))
            <p class="text-danger mt-2">Laporan dengan kode tersebut tidak ditemukan.</p>
            @endif
        </div>
    </div>
</div>
@endsection

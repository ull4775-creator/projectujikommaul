@extends('layouts.app') <!-- Sesuaikan dengan layout kamu -->

@section('title', 'Detail Laporan')

@section('content')
<div class="container">
    <h1>Detail Laporan</h1>

    <div class="card mb-3">
        <div class="card-header">
            <strong>Kode Laporan:</strong> {{ $pengaduan->kode }}
        </div>
        <div class="card-body">
            <p><strong>No Sambungan:</strong> {{ $pengaduan->no_sa }}</p>
            <p><strong>Alamat Lengkap:</strong> {{ $pengaduan->alamat_lengkap }}</p>
            <p><strong>Kategori:</strong> {{ $pengaduan->kategori->nama ?? '-' }}</p>
            <p><strong>Lokasi Kejadian:</strong> {{ $pengaduan->email }}</p>
            <p><strong>Keterangan:</strong> {{ $pengaduan->ket }}</p>
            <p><strong>Status Terakhir:</strong> {{ $pengaduan->status }}</p>
            <p><strong>Foto:</strong></p>
            @if($pengaduan->foto)
                <img src="{{ asset('uploads/' . $pengaduan->foto) }}" alt="Foto Laporan" class="img-fluid" style="max-width: 400px;">
            @else
                <p>Tidak ada foto</p>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <strong>Riwayat Tracking</strong>
        </div>
        <div class="card-body">
            @if($pengaduan->trackings->count() > 0)
                <ul class="list-group">
                    @foreach($pengaduan->trackings as $tracking)
                        <li class="list-group-item">
                            <strong>{{ $tracking->created_at->format('d M Y H:i') }}</strong> - 
                            {{ $tracking->status }} 
                            @if($tracking->catatan)
                                - Catatan: {{ $tracking->catatan }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Belum ada riwayat tracking.</p>
            @endif
        </div>
    </div>

</div>
@endsection

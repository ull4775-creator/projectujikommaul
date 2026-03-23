@extends('layouts.app')

@section('title','Data Pengaduan Terfilter')

@section('content')
<div class="container-fluid py-4">

    <h4 class="mb-3">
        📊 Data Pengaduan
        @if($cabang) — Cabang: <b>{{ ucfirst(str_replace('_',' ',$cabang)) }}</b> @endif
        @if($tingkat) — Tingkat: <b>{{ ucfirst($tingkat) }}</b> @endif
    </h4>

    <a href="{{ route('pengaduan.filter.pdf', request()->query()) }}"
       class="btn btn-danger mb-3">
        🖨️ Print PDF
    </a>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>No Sambungan</th>
                        <th>Cabang</th>
                        <th>Tingkat</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengaduans as $p)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $p->kode }}</td>
                        <td>{{ $p->no_sa }}</td>
                        <td>{{ $p->lokasi_daerah_cabang }}</td>
                        <td>{{ ucfirst($p->tingkat_masalah) }}</td>
                        <td>{{ ucfirst($p->status) }}</td>
                        <td>{{ $p->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Tidak ada data
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

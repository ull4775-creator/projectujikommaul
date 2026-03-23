@extends('layouts.app')

@section('title', 'Daftar Laporan Pengaduan Cabang 1')

@section('content')
<style>
    main {
        width: 100% !important;
        max-width: 100% !important;
    }

    table {
        width: 100% !important;
        table-layout: fixed;
    }

    th, td {
        white-space: normal !important;
        word-break: break-word;
        font-size: 13px;
        padding: 8px;
        vertical-align: middle;
    }

    th {
        font-weight: 600;
    }

    .img-thumb {
        max-width: 55px;
        height: auto;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <main class="col-12 px-4 py-4">

            <h4 class="fw-semibold mb-4 text-center">
                📋 Daftar Laporan Pengaduan – Pusat Bhayangkara
            </h4>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <table class="table table-hover align-middle text-center mb-0">
                        <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>No Sambungan</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Maps</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Cabang</th>
                            <th>Tingkat</th>
                            <th>Keterangan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($pengaduans as $pengaduan)
                            @php
                                $lastTracking = $pengaduan->trackings->last();
                                $status = strtolower($lastTracking->status ?? $pengaduan->status);
                            @endphp

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <span class="badge bg-primary">
                                        {{ $pengaduan->kode }}
                                    </span>
                                </td>

                                <td class="text-start">{{ $pengaduan->no_sa }}</td>
                                <td class="text-start">{{ $pengaduan->nama }}</td>
                                <td>{{ $pengaduan->no_hp }}</td>

                                <td>
                                    @if($pengaduan->share_lokasi)
                                        <a href="{{ $pengaduan->share_lokasi }}"
                                           target="_blank"
                                           class="btn btn-sm btn-outline-primary">
                                            📍 Maps
                                        </a>
                                    @else
                                        <span class="text-muted">–</span>
                                    @endif
                                </td>

                                <td class="text-start">
                                    {{ $pengaduan->alamat_lengkap }}
                                </td>

                                <td class="text-start">
                                    {{ $pengaduan->email }}
                                </td>

                                <td>
                                    {{ $pengaduan->lokasi_daerah_cabang }}
                                </td>

                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ ucfirst($pengaduan->tingkat_masalah) }}
                                    </span>
                                </td>

                                <td class="text-start">
                                    {{ $pengaduan->ket }}
                                </td>

                                <td>
                                    @if($pengaduan->foto)
                                        <img src="{{ asset('storage/'.$pengaduan->foto) }}"
                                             class="img-thumbnail img-thumb">
                                    @else
                                        <span class="text-muted">–</span>
                                    @endif
                                </td>

                                {{-- STATUS --}}
                                <td>
                                    <span class="badge
                                        @if($status=='menunggu') bg-primary
                                        @elseif($status=='proses') bg-warning text-dark
                                        @elseif($status=='selesai') bg-success
                                        @else bg-secondary @endif">
                                        {{ ucfirst($status) }}
                                    </span>

                                    @if($lastTracking)
                                        <div class="small text-muted">
                                            {{ $lastTracking->updated_at->format('d/m/Y H:i') }}
                                        </div>
                                    @endif

                                    <form action="{{ route('admin.pengaduan.updateStatus', $pengaduan->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')

                                        <select name="status"
                                                class="form-select form-select-sm mt-1"
                                                onchange="this.form.submit()">
                                            <option value="menunggu" {{ $status=='menunggu' ? 'selected' : '' }}>
                                                Menunggu
                                            </option>
                                            <option value="proses" {{ $status=='proses' ? 'selected' : '' }}>
                                                Proses
                                            </option>
                                            <option value="selesai" {{ $status=='selesai' ? 'selected' : '' }}>
                                                Selesai
                                            </option>
                                        </select>
                                    </form>
                                </td>

                                {{-- AKSI --}}
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('admin.pengaduan.detail', $pengaduan->id) }}"
                                           class="btn btn-sm btn-success">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.pengaduan.detail', $pengaduan->id) }}#chat"
                                           class="btn btn-sm btn-primary">
                                            <i class="fas fa-comments"></i>
                                        </a>

                                        <form action="{{ route('admin.pengaduan.destroy', $pengaduan->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="14" class="fw-semibold text-warning py-4">
                                    Belum ada laporan pengaduan untuk Pusat Bhayangkara.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

        </main>
    </div>
</div>
@endsection

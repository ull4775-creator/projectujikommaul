@extends('layouts.mobile')

@section('content')
<div class="container py-3">

    {{-- HEADER --}}
    <div class="mb-3">
        <h6 class="fw-bold mb-0">Dashboard</h6>
        <small class="text-muted">{{ now()->translatedFormat('d F Y') }}</small>
    </div>

    {{-- SUMMARY --}}
    <div class="row g-2">
        <div class="col-6">
            <div class="card text-center">
                <div class="card-body py-3">
                    <small>Total</small>
                    <h5>{{ $totalPelaporan }}</h5>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card text-center">
                <div class="card-body py-3">
                    <small>Selesai</small>
                    <h5 class="text-success">{{ $selesai }}</h5>
                </div>
            </div>
        </div>
    </div>

    {{-- SLA ALERT --}}
    @if($slaLewat > 0)
    <div class="alert alert-danger mt-3">
        ⚠️ {{ $slaLewat }} pengaduan melewati SLA
    </div>
    @endif

    {{-- PRIORITAS --}}
    <div class="px-3 mt-3">
    <h6 class="mb-2">🚨 Perlu Perhatian</h6>

    @forelse($butuhPerhatian->take(3) as $p)
        <div class="card mb-2 shadow-sm">
            <div class="card-body p-2">
                <small class="text-muted">
                    {{ $p->kode }} • {{ $p->created_at->diffForHumans() }}
                </small>
                <div class="fw-bold">{{ $p->nama }}</div>
                <small>Status: {{ ucfirst($p->status) }}</small>
            </div>
        </div>
    @empty
        <small class="text-muted">Tidak ada pengaduan prioritas</small>
    @endforelse
</div>


</div>
@endsection

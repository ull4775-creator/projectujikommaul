@extends('layouts.frontend')

@section('title', 'Hasil Cek Status')
@section('content')



<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">

                {{-- Header --}}
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <i class="bi bi-clipboard-check fs-4 me-2"></i>
                    <h5 class="mb-0">Status Pengaduan</h5>
                </div>

                <div class="card-body">

                    {{-- Kode Pengaduan --}}
                    <div class="mb-3">
                        <small class="text-muted">Kode Pengaduan</small>
                        <h5 class="fw-bold">{{ $pengaduan->kode }}</h5>
                    </div>

                    {{-- Status --}}
                    @php
                        $statusClass = match ($lastTracking?->status) {
                            'menunggu' => 'secondary',
                            'proses'   => 'warning',
                            'selesai'  => 'success',
                            default    => 'dark',
                        };
                    @endphp

                    <div class="mb-3">
                        <small class="text-muted">Status Saat Ini</small><br>
                        <span class="badge bg-{{ $statusClass }} px-3 py-2 fs-6 text-uppercase">
                            {{ $lastTracking?->status ?? $pengaduan->status }}
                        </span>
                    </div>

                    {{-- Pesan Admin --}}
                    <div class="mb-4">
                        <small class="text-muted">Pesan / Keterangan</small>
                        <div class="border rounded p-3 bg-light">
                            {{ $lastTracking?->feedback ?? 'Belum ada pesan dari admin.' }}
                        </div>
                    </div>

                    {{-- Riwayat Pesan --}}
                    <hr>
                    <h6 class="mb-3">Riwayat Pesan</h6>

                    @forelse ($pengaduan->trackings as $track)
                        @if ($track->feedback)
                            <div class="mb-2 p-3 border rounded">
                                <small class="text-muted">
                                    {{ $track->created_at->format('d M Y H:i') }}
                                </small>
                                <div>{{ $track->feedback }}</div>
                            </div>
                        @endif
                    @empty
                        <p class="text-muted">Belum ada riwayat pesan.</p>
                    @endforelse

                   {{-- Chat --}}
<hr>
<h6>💬 Chat dengan Admin</h6>

<div class="border rounded p-3 mb-3" style="max-height:300px; overflow:auto;">
    @foreach ($pengaduan->chats as $chat)
        <div class="mb-2 d-flex {{ $chat->pengirim === 'user' ? 'justify-content-end' : 'justify-content-start' }}">
            
            <div class="p-2 rounded 
                {{ $chat->pengirim === 'user' ? 'bg-primary text-white' : 'bg-light text-dark' }}"
                style="max-width:75%">

                {{-- Label pengirim --}}
                <small class="fw-bold">
                    {{ $chat->pengirim === 'user' ? 'Anda' : 'Admin' }}
                </small>

                {{-- Pesan --}}
                <div>{{ $chat->pesan }}</div>

                {{-- Waktu --}}
                <small class="text-muted d-block" style="font-size:0.75rem;">
                    {{ $chat->created_at->format('d/m/Y H:i') }}
                </small>

                {{-- tombol hapus hanya untuk chat user --}}
                @if ($chat->pengirim === 'user')
                    <form method="POST" action="{{ route('chat.delete', $chat->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-link text-danger p-0">hapus</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
</div>

{{-- Form Kirim Chat --}}
<form method="POST" action="{{ route('pengaduan.chat.user', $pengaduan->id) }}">
    @csrf
    <textarea name="pesan" class="form-control mb-2" required></textarea>
    <button class="btn btn-primary btn-sm">Kirim</button>
</form>

                    {{-- Footer --}}
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('pengaduan.cek.form') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>

                        <span class="text-muted small align-self-center">
                            Terakhir diperbarui:
                            {{ optional($lastTracking?->updated_at)->format('d M Y H:i') ?? '-' }}
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


{{-- <button onclick="sendChat({{ $pengaduan->id }})" class="btn btn-primary btn-sm">Kirim</button> --}}

<script>
function sendChat(id){
    fetch(`/cek-status/${id}/chat`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ pesan: document.querySelector('textarea[name=pesan]').value })
    })
    .then(res => res.json())
    .then(data => location.reload())
}
</script>


@endsection

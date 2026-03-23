@extends('layouts.app')

@section('content')
<style>
/* ===== GLOBAL STYLES ===== */
.page-title {
    font-weight: 700;
    font-size: 1.8rem;
    color: #1e293b;
}
.card {
    border: none;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
}
.shadow-soft {
    box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
}
.text-muted-sm {
    font-size: .85rem;
    color: #64748b;
}

/* ===== SUMMARY CARDS ===== */
.summary-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 25px;
}
.summary-card {
    background: linear-gradient(135deg, #f8fafc, #e2e8f0);
    border-radius: 16px;
    padding: 20px;
    border-left: 4px solid #2563eb;
    transition: all 0.3s ease;
    cursor: default;
}
.summary-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 28px rgba(37, 99, 235, .15);
}
.summary-card.success {
    border-left-color: #10b981;
    background: linear-gradient(135deg, #f0fdf4, #d1fae5);
}
.summary-card.warning {
    border-left-color: #f59e0b;
    background: linear-gradient(135deg, #fff7ed, #ffedd5);
}
.summary-card.info {
    border-left-color: #3b82f6;
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
}
.summary-card.danger {
    border-left-color: #ef4444;
    background: linear-gradient(135deg, #fef2f2, #fee2e2);
}
.summary-value {
    font-size: 2rem;
    font-weight: 800;
    margin: 8px 0;
    color: #1e293b;
}
.summary-label {
    font-size: 0.85rem;
    color: #64748b;
    font-weight: 500;
}
.summary-icon {
    font-size: 1.8rem;
    opacity: 0.6;
}

/* ===== FILTER SECTION ===== */
.filter-section {
    background: linear-gradient(135deg, #f8fafc, #e2e8f0);
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 25px;
    border: 1px solid #e2e8f0;
}
.filter-title {
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.filter-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 15px;
    align-items: end;
}

/* ===== BUTTONS ===== */
.btn-primary {
    background: linear-gradient(135deg, #2563eb, #3b82f6);
    border: none;
    padding: 10px 20px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
}
.btn-secondary {
    background: linear-gradient(135deg, #64748b, #94a3b8);
    border: none;
    padding: 10px 20px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.btn-secondary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(100, 116, 139, 0.3);
}
.btn-pdf {
    background: linear-gradient(135deg, #dc2626, #ef4444);
    border: none;
    padding: 10px 20px;
    border-radius: 12px;
    font-weight: 600;
    color: white;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
}
.btn-pdf:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
    background: linear-gradient(135deg, #b91c1c, #dc2626);
}
.btn-excel {
    background: linear-gradient(135deg, #166534, #22c55e);
    border: none;
    padding: 10px 20px;
    border-radius: 12px;
    font-weight: 600;
    color: white;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(34, 197, 94, 0.3);
}
.btn-excel:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(34, 197, 94, 0.4);
    background: linear-gradient(135deg, #15803d, #16a34a);
}

/* ===== TABLE STYLES ===== */
.table-responsive {
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}
.table {
    margin-bottom: 0;
}
.table thead {
    background: linear-gradient(135deg, #2563eb, #3b82f6);
    color: white;
}
.table thead th {
    font-weight: 700;
    padding: 16px;
    border: none;
}
.table tbody tr {
    transition: all 0.2s ease;
    border-bottom: 1px solid #f1f5f9;
}
.table tbody tr:hover {
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    transform: scale(1.005);
}
.table tbody td {
    padding: 14px 16px;
    vertical-align: middle;
}
.table tbody td:first-child {
    font-weight: 700;
    color: #1e293b;
}
.badge {
    padding: 6px 12px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.85rem;
}

/* ===== EMPTY STATE ===== */
.empty-state {
    text-align: center;
    padding: 60px 20px;
}
.empty-state i {
    font-size: 4rem;
    color: #cbd5e1;
    margin-bottom: 15px;
}
.empty-state p {
    color: #64748b;
    font-size: 1.1rem;
}

/* ===== BADGE COLORS ===== */
.badge.bg-success {
    background: linear-gradient(135deg, #166534, #22c55e);
}
.badge.bg-warning {
    background: linear-gradient(135deg, #b45309, #f59e0b);
    color: white;
}
.badge.bg-info {
    background: linear-gradient(135deg, #1e40af, #3b82f6);
    color: white;
}
.badge.bg-danger {
    background: linear-gradient(135deg, #b91c1c, #ef4444);
}
.badge.bg-primary {
    background: linear-gradient(135deg, #1e3a8a, #3b82f6);
}

/* ===== ACTION BUTTONS ===== */
.action-buttons {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}
.action-buttons .btn {
    flex: 1;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .summary-grid {
        grid-template-columns: 1fr;
    }
    .filter-row {
        grid-template-columns: 1fr;
    }
    .action-buttons {
        flex-direction: column;
    }
}

/* ===== FILTER BADGE ===== */
.filter-badge {
    display: inline-block;
    background: linear-gradient(135deg, #1e3a8a, #3b82f6);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    margin: 3px;
}
</style>

<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="page-title mb-0">
                    <i class="fas fa-file-alt me-2"></i>
                    Laporan Bulanan Pengaduan
                </h4>
                <small class="text-muted-sm">
                    <i class="fas fa-calendar-alt me-1"></i>
                    Periode: {{ $bulanList[$bulan] }} {{ $tahun }}
                </small>
            </div>
            
            <!-- Filter Active Badges -->
            <div class="mt-3">
                @if($cabang !== 'all')
                    <span class="filter-badge">
                        <i class="fas fa-building me-1"></i>
                        Cabang: {{ $cabangList[$cabang] }}
                    </span>
                @endif
                @if($kategori !== 'all')
                    <span class="filter-badge">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        Kategori: {{ $kategoriList[$kategori] }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- RINGKASAN DASHBOARD -->
    <div class="row summary-grid">
        <div class="summary-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="summary-label">
                        <i class="fas fa-users me-2"></i>Total Pengguna
                    </div>
                    <div class="summary-value">{{ number_format($totalPengguna ?? 0) }}</div>
                </div>
                <i class="fas fa-users summary-icon text-primary"></i>
            </div>
        </div>

        <div class="summary-card info">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="summary-label">
                        <i class="fas fa-water me-2"></i>Total Pelaporan
                    </div>
                    <div class="summary-value">{{ number_format($totalPelaporan ?? 0) }}</div>
                </div>
                <i class="fas fa-water summary-icon text-blue-500"></i>
            </div>
        </div>

        <div class="summary-card success">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="summary-label">
                        <i class="fas fa-check-circle me-2"></i>Persentase Selesai
                    </div>
                    <div class="summary-value">{{ $persenSelesai ?? 0 }}%</div>
                </div>
                <i class="fas fa-check-circle summary-icon text-green-500"></i>
            </div>
        </div>

        <div class="summary-card warning">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="summary-label">
                        <i class="fas fa-clock me-2"></i>Menunggu (>24jam)
                    </div>
                    <div class="summary-value">{{ number_format($menunggu ?? 0) }}</div>
                </div>
                <i class="fas fa-clock summary-icon text-amber-500"></i>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-soft">
                <div class="card-body">
                    <!-- FORM FILTER -->
                    <div class="filter-section">
                        <h6 class="filter-title">
                            <i class="fas fa-filter me-2"></i>Filter Laporan
                        </h6>
                        <form method="GET" class="filter-form">
                            <div class="filter-row">
                                <div>
                                    <label class="form-label fw-semibold text-muted-sm mb-1">
                                        <i class="fas fa-calendar me-1"></i>Bulan
                                    </label>
                                    <select name="bulan" class="form-select form-select-lg" style="border-radius: 12px;">
                                        @foreach($bulanList as $key => $nama)
                                            <option value="{{ $key }}" {{ $key == $bulan ? 'selected' : '' }}>
                                                {{ $nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="form-label fw-semibold text-muted-sm mb-1">
                                        <i class="fas fa-calendar-year me-1"></i>Tahun
                                    </label>
                                    <select name="tahun" class="form-select form-select-lg" style="border-radius: 12px;">
                                        @foreach($tahunList as $thn)
                                            <option value="{{ $thn }}" {{ $thn == $tahun ? 'selected' : '' }}>
                                                {{ $thn }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="form-label fw-semibold text-muted-sm mb-1">
                                        <i class="fas fa-building me-1"></i>Cabang
                                    </label>
                                    <select name="cabang" class="form-select form-select-lg" style="border-radius: 12px;">
                                        @foreach($cabangList as $key => $nama)
                                            <option value="{{ $key }}" {{ $key == $cabang ? 'selected' : '' }}>
                                                {{ $nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="form-label fw-semibold text-muted-sm mb-1">
                                        <i class="fas fa-exclamation-triangle me-1"></i>Kategori Masalah
                                    </label>
                                    <select name="kategori" class="form-select form-select-lg" style="border-radius: 12px;">
                                        @foreach($kategoriList as $key => $nama)
                                            <option value="{{ $key }}" {{ $key == $kategori ? 'selected' : '' }}>
                                                {{ $nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary flex-grow-1">
                                        <i class="fas fa-search me-2"></i>Terapkan Filter
                                    </button>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i>
                                    </a>
                                </div>

                                <div class="d-flex gap-2">
                                    <a href="{{ route('laporan.bulanan.pdf', [
                                        'bulan' => $bulan, 
                                        'tahun' => $tahun,
                                        'cabang' => $cabang,
                                        'kategori' => $kategori
                                    ]) }}" 
                                       class="btn btn-pdf flex-grow-1" target="_blank">
                                        <i class="fas fa-file-pdf me-2"></i>Export PDF
                                    </a>
                                    <a href="{{ route('laporan.bulanan.excel', [
                                        'bulan' => $bulan, 
                                        'tahun' => $tahun,
                                        'cabang' => $cabang,
                                        'kategori' => $kategori
                                    ]) }}" 
                                       class="btn btn-excel flex-grow-1">
                                        <i class="fas fa-file-excel me-2"></i>Export Excel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- TABEL LAPORAN -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th style="min-width: 200px;">Cabang</th>
                                    <th style="min-width: 120px;" class="text-center">Total</th>
                                    <th style="min-width: 120px;" class="text-center">Selesai</th>
                                    <th style="min-width: 120px;" class="text-center">Proses</th>
                                    <th style="min-width: 120px;" class="text-center">Menunggu</th>
                                    <th style="min-width: 180px;" class="text-center">Persentase Selesai</th>
                                    <th style="min-width: 150px;" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $row)
                                @php
                                    $total = $row->proses + $row->selesai;
                                    $persen = $total > 0 ? round(($row->selesai / $total) * 100, 1) : 0;
                                    $badgeClass = $persen >= 80 ? 'bg-success' : ($persen >= 50 ? 'bg-warning' : 'bg-danger');
                                @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="fas fa-building text-primary"></i>
                                            <strong>{{ strtoupper($row->cabang) }}</strong>
                                        </div>
                                    </td>
                                    <td class="text-center fw-bold text-primary">{{ $row->total }}</td>
                                    <td class="text-center text-success fw-semibold">{{ $row->selesai }}</td>
                                    <td class="text-center text-info fw-semibold">{{ $row->proses }}</td>
                                    <td class="text-center text-warning fw-semibold">{{ $row->menunggu }}</td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-2">
                                            <div style="width: 80px; height: 8px; background: #e2e8f0; border-radius: 4px; overflow: hidden;">
                                                <div style="width: {{ $persen }}%; height: 100%; background: linear-gradient(90deg, #10b981, #22c55e); border-radius: 4px;"></div>
                                            </div>
                                            <span class="badge {{ $badgeClass }}">{{ $persen }}%</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.pengaduan.cabang', Str::slug($row->cabang, '_')) }}" 
                                            class="btn btn-sm btn-primary" 
                                            title="Lihat Detail {{ $row->cabang }}">
                                        <i class="fas fa-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="empty-state">
                                            <i class="fas fa-inbox"></i>
                                            <p class="text-muted mb-0">Tidak ada data pada periode ini</p>
                                            <small class="text-muted-sm d-block mt-2">
                                                Silakan ubah filter untuk melihat data lainnya
                                            </small>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- FOOTER INFO -->
                    @if($data->count() > 0)
                    <div class="mt-4 p-3 bg-light rounded-3">
                        <div class="row">
                            <div class="col-md-6">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Data diambil dari sistem pengaduan Perumda Air Minum Tirta Wibawa
                                </small>
                            </div>
                            <div class="col-md-6 text-end">
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i>
                                    Update terakhir: {{ now()->format('d M Y H:i') }}
                                </small>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- DEPENDENCIES --}}
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
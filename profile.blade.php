@extends('layouts.app')
@section('content')
<style>
    .profile-container {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        padding: 30px;
        max-width: 1200px;
        margin: 30px auto;
    }
    .profile-header {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eaeaea;
    }
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, #1e3a8a, #3b82f6);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 25px;
        color: white;
        font-size: 3rem;
    }
    .profile-info h1 {
        font-size: 2rem;
        margin-bottom: 10px;
        color: #2c3e50;
    }
    .profile-info p {
        color: #6c757d;
        font-size: 1.1rem;
    }
    .profile-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin: 25px 0;
    }
    .stat-card {
        background: #f8fafc;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        transition: all 0.3s;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }
    .stat-value {
        font-size: 2.2rem;
        font-weight: 700;
        color: #1e293b;
        margin: 10px 0;
    }
    .stat-label {
        font-size: 1rem;
        color: #64748b;
    }
    .profile-details {
        background: #f8fafc;
        border-radius: 16px;
        padding: 25px;
        margin-top: 30px;
    }
    .detail-row {
        display: flex;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eaeaea;
    }
    .detail-label {
        width: 25%;
        font-weight: 600;
        color: #475569;
    }
    .detail-value {
        width: 75%;
        color: #1e293b;
    }
    .btn-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }
    .btn-edit {
        background: linear-gradient(135deg, #1e3a8a, #3b82f6);
        color: white;
        padding: 10px 25px;
        font-size: 1rem;
    }
    .btn-back {
        background: #e2e8f0;
        color: #475569;
        padding: 10px 25px;
        font-size: 1rem;
    }
</style>

<div class="container-fluid py-4">
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="fas fa-user"></i>
            </div>
            <div class="profile-info">
                <h1>{{ $pengguna->nama }}</h1>
                <p>
                    <strong>{{ $pengguna->username }}</strong> • 
                    <span class="badge 
                        {{ $pengguna->role === 'admin' ? 'bg-danger' : 'bg-primary' }} 
                        text-white">
                        {{ strtoupper($pengguna->role) }}
                    </span>
                </p>
            </div>
        </div>

        <div class="profile-stats">
            <div class="stat-card">
                <div class="stat-label">NIK</div>
                <div class="stat-value">{{ $pengguna->nik }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Cabang</div>
                <div class="stat-value">{{ $pengguna->cabang ?? 'N/A' }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Email</div>
                <div class="stat-value">{{ $pengguna->email }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">No. HP</div>
                <div class="stat-value">{{ $pengguna->no_hp }}</div>
            </div>
        </div>

        <div class="profile-details">
            <div class="detail-row">
                <div class="detail-label">Alamat</div>
                <div class="detail-value">{{ $pengguna->alamat ?? 'N/A' }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Role</div>
                <div class="detail-value">
                    <span class="badge 
                        {{ $pengguna->role === 'admin' ? 'bg-danger' : 'bg-primary' }} 
                        text-white">
                        {{ strtoupper($pengguna->role) }}
                    </span>
                </div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Status</div>
                <div class="detail-value">
                    <span class="badge bg-success text-white">
                        Aktif
                    </span>
                </div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Password</div>
                <div class="detail-value">••••••••</div>
            </div>
        </div>

        <div class="btn-actions">
            <a href="{{ route('admin.pengguna.edit', $pengguna->id_pengguna) }}" class="btn btn-edit">
                <i class="fas fa-edit me-2"></i>Edit Profil
            </a>
            <a href="{{ route('admin.pengguna.index') }}" class="btn btn-back">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>
</div>
@endsection
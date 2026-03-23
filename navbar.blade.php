<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Pengaduan PDAM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">

  <link rel="icon" href="{{asset('backend/dist/img/L-WqjtR6_400x400-removebg-preview (1).png')}}">
<style>
  .detailtable{
  padding-bottom:10px;    
  }

  .navbar .nav-link{
    color:#e5e7eb;
    padding:.55rem 1rem;
    border-radius:12px;
    transition:all .25s ease;
    font-weight:500;
}

.navbar .nav-link:hover{
    background:rgba(255,255,255,.08);
    color:#fff;
    transform:translateY(-1px);
}

.active-nav{
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    color:#fff !important;
    box-shadow:0 6px 18px rgba(37,99,235,.35);
}

</style>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('backend/dist/img/L-WqjtR6_400x400-removebg-preview (1).png')}}" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <!-- TOP NAVBAR MODERN -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm"
     style="background:linear-gradient(135deg,#0f172a,#1e293b);">

    <div class="container-fluid">

        <!-- LOGO -->
        <a href="{{ url('/admin.dashboard') }}" class="navbar-brand d-flex align-items-center gap-2">
            <img src="{{ asset('backend/dist/img/L-WqjtR6_400x400-removebg-preview (1).png') }}"
                 style="width:38px;height:38px;border-radius:50%">
            <span class="fw-bold">Pengaduan PDAM</span>
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#topNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="topNavbar">

            <!-- LEFT MENU -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-lg-1">

                <li class="nav-item">
                    <a href="{{ url('admin.dashboard.') }}"
                       class="nav-link {{ request()->is('admin') ? 'active-nav' : '' }}">
                        <i class="fas fa-chart-line me-1"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.pengaduan.index') }}"
                       class="nav-link {{ request()->is('admin/pengaduan*') ? 'active-nav' : '' }}">
                        <i class="fas fa-water me-1"></i> Pengaduan
                    </a>
                </li>

                @if(optional(Auth::user())->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('pengguna.index') }}"
                       class="nav-link {{ request()->is('pengguna*') ? 'active-nav' : '' }}">
                        <i class="fas fa-users me-1"></i> Pengguna
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}"
                       class="nav-link {{ request()->is('kategori*') ? 'active-nav' : '' }}">
                        <i class="fas fa-list me-1"></i> Kategori
                    </a>
                </li>
                @endif

            </ul>

            <!-- RIGHT MENU -->
            <ul class="navbar-nav ms-auto align-items-center gap-3">

                <!-- USER -->
                <li class="nav-item text-white small d-none d-lg-block">
                    👋 {{ Auth::user()->username ?? 'Admin' }}
                </li>

                <!-- LOGOUT -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-danger rounded-pill px-3 shadow-sm">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>



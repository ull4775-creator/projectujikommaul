<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- TITLE + LOGO -->
    <title> 💧 Pengaduan PDAM Tirta Wibawa</title>
    <link rel="icon" href="{{asset('backend/dist/img/L-WqjtR6_400x400-removebg-preview (1).png')}}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <style>
        :root{
            --nav-dark:#0b1220;
            --nav-dark-2:#111827;
            --primary:#2563eb;
        }

        body{
            background:#f8fafc;
            font-family:system-ui,-apple-system,"Segoe UI",Roboto;
        }

        /* ===== NAVBAR ===== */
        .top-navbar{
            background:linear-gradient(135deg,var(--nav-dark),var(--nav-dark-2));
            backdrop-filter:blur(8px);
        }

        .navbar-brand span{
            letter-spacing:-.3px;
        }

        .top-navbar .nav-link{
            color:#e5e7eb;
            border-radius:14px;
            padding:.55rem 1rem;
            transition:all .25s ease;
            font-weight:500;
            display:flex;
            align-items:center;
            gap:.4rem;
        }

        .top-navbar .nav-link:hover{
            background:rgba(255,255,255,.12);
            color:#fff;
            transform:translateY(-1px);
        }

        .top-navbar .active{
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            color:#fff !important;
            box-shadow:0 8px 22px rgba(37,99,235,.35);
        }

        .navbar-toggler{
            box-shadow:none !important;
        }

        /* ===== CONTENT ===== */
        main{
            padding-top:88px;
            padding-left:1rem;
            padding-right:1rem;
        }

        /* ===== SMALL ENHANCEMENT ===== */
        .btn-danger{
            background:linear-gradient(135deg,#dc2626,#ef4444);
            border:none;
        }
    </style>
</head>

<body>

@auth
<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top top-navbar shadow-sm">
    <div class="container-fluid">

        <!-- LOGO (ROLE AWARE) -->
        <a href="{{ Auth::user()->role === 'admin'
                ? route('admin.dashboard')
                : route('admin.pengaduan.index') }}"
           class="navbar-brand d-flex align-items-center gap-2">

            <img src="{{ asset('backend/dist/img/L-WqjtR6_400x400-removebg-preview (1).png') }}"
                 width="38" height="38" class="rounded-circle shadow-sm">
            <span class="fw-semibold">Pengaduan PDAM</span>
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="mainNavbar">

            <!-- LEFT -->
            <ul class="navbar-nav me-auto gap-lg-1 mt-2 mt-lg-0">

                {{-- DASHBOARD (ADMIN ONLY) --}}
                @if(Auth::user()->role === 'admin')
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="fas fa-chart-line"></i> Dashboard
                    </a>
                </li>
                @endif

                {{-- PENGADUAN (ADMIN & PETUGAS) --}}
                <li class="nav-item">
                    <a href="{{ route('admin.pengaduan.index') }}"
                       class="nav-link {{ request()->is('admin/pengaduan*') ? 'active' : '' }}">
                        <i class="fas fa-water"></i> Pengaduan
                    </a>
                </li>

                {{-- ADMIN ONLY --}}
                @if(Auth::user()->role === 'admin')

                <li class="nav-item">
                    <a href="{{ route('admin.pengguna.index') }}"
                       class="nav-link {{ request()->is('admin/pengguna*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i> Pengguna
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.kategori.index') }}"
                       class="nav-link {{ request()->is('admin/kategori*') ? 'active' : '' }}">
                        <i class="fas fa-layer-group"></i> Kategori
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pengaduan.cek.form') }}"
                       class="nav-link {{ request()->is('cek-status*') ? 'active' : '' }}">
                        <i class="fas fa-search"></i> Cek Status
                    </a>
                </li>

                @endif
            </ul>

            <!-- RIGHT -->
            <ul class="navbar-nav ms-auto align-items-center gap-3">
                <li class="nav-item text-white small d-none d-lg-block opacity-75">
                    👋 {{ Auth::user()->name ?? Auth::user()->username }}
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!-- ================= END NAVBAR ================= -->

<main class="container-fluid">
    @yield('content')
</main>
@endauth


@guest
<main class="py-5">
    @yield('content')
</main>
@endguest


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- ✅ RUNNING TEXT DI TAB BROWSER DENGAN LOGO 💧 -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Teks dasar dengan logo 💧
    const baseText = "💧 Pengaduan PDAM Tirta Wibawa - Layanan Air Bersih";
    let pos = 0;

    setInterval(() => {
        // Geser teks ke kiri satu karakter per interval
        document.title = baseText.substring(pos) + baseText.substring(0, pos);
        pos = (pos + 1) % baseText.length;
    }, 400); // Kecepatan animasi (ms)
});
</script>

@stack('scripts')
</body>
</html>
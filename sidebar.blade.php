<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link d-flex align-items-center">
        <img src="{{ asset('backend/dist/img/L-WqjtR6_400x400-removebg-preview (1).png') }}" 
             alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width:40px; height:40px;">
        <span class="brand-text fw-bold ms-2">Pengaduan PDAM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column justify-content-between" style="height: calc(100vh - 57px);">
        <!-- Menu -->
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <!-- Dashboard -->
                <li class="nav-item mb-1">
                    <a href="{{ url('/home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="ms-1">Dashboard</p>
                    </a>
                </li>

                <!-- Pengaduan PDAM -->
                <li class="nav-item mb-1">
                    <a href="{{ route('admin.pengaduan.index') }}" class="nav-link {{ request()->is('admin/pengaduan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-water"></i>
                        <p class="ms-1">Pengaduan PDAM</p>
                    </a>
                </li>

                @if(optional(Auth::user())->role == 'admin')
                    <!-- Pengguna -->
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.pengguna.index') }}" class="nav-link {{ request()->is('pengguna*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p class="ms-1">Pengguna</p>
                        </a>
                    </li>

                    <!-- Kategori -->
                    <li class="nav-item mb-1">
                        <a href="{{ route('admin.kategori.index') }}" class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p class="ms-1">Kategori</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>

        <!-- Logout -->
        <div class="p-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100 d-flex align-items-center justify-content-center">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </div>
    </div>
</aside>

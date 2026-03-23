<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Cek Status Pengaduan')</title>

    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>
<body>

{{-- NAVBAR LANDING --}}
<nav class="navbar navbar-light bg-white shadow-sm px-4">
    <a href="/" class="navbar-brand fw-bold text-primary">
        Pengaduan PDAM
    </a>
</nav>

<main>
    @yield('content')
</main>

</body>
</html>

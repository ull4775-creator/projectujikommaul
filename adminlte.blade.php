<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Dashboard | PDAM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- AdminLTE 5 CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap/css/bootstrap.min.css') }}">

    @stack('css')
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">
    @include('partials.navbar')
    @include('partials.sidebar')

    <main class="app-main">
        <div class="app-content p-3">
            @yield('content')
        </div>
    </main>
</div>

<!-- Bootstrap -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE 5 -->
<script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>

<!-- ChartJS (ADMINLTE STYLE) -->
<script src="{{ asset('adminlte/plugins/chart.js/chart.umd.js') }}"></script>

@stack('js')
</body>
</html>

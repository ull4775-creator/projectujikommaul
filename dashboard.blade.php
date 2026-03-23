<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Dashboard')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom CSS --}}
    @stack('styles')
</head>
<body class="bg-light">

    {{-- NAVBAR --}}
    @include('partials.navbar')

    {{-- CONTENT --}}
    <main class="container-fluid py-4">
        @yield('content')
    </main>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Chart.js (HANYA dashboard) --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    {{-- Custom JS --}}
    @stack('scripts')

</body>
</html>

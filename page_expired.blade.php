<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Page Expired</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <h1 class="display-4 text-danger">419</h1>
        <h2 class="mb-4">Page Expired</h2>
        <p class="mb-4">Maaf, halaman ini sudah kadaluwarsa. Silakan refresh halaman dan coba lagi.</p>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
        <a href="{{ route('pengaduan.create') }}" class="btn btn-secondary">Mulai Lagi</a>
    </div>
</body>
</html>

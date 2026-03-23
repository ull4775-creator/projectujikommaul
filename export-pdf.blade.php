<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengaduan</title>
    <style>
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #000; padding:6px; }
    </style>
</head>
<body>

<h3>Laporan Pengaduan</h3>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>No Sambungan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengaduans as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->kode }}</td>
            <td>{{ $p->no_sa }}</td>
            <td>{{ $p->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #000; padding:5px; }
        th { background:#eee; }
    </style>
</head>
<body>

<h3>Data Pengaduan PDAM</h3>

@if($cabang)
<p>Cabang: <b>{{ $cabang }}</b></p>
@endif
@if($tingkat)
<p>Tingkat Masalah: <b>{{ ucfirst($tingkat) }}</b></p>
@endif

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>No Sambungan</th>
            <th>Cabang</th>
            <th>Tingkat</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengaduans as $i => $p)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $p->kode }}</td>
            <td>{{ $p->no_sa }}</td>
            <td>{{ $p->lokasi_daerah_cabang }}</td>
            <td>{{ ucfirst($p->tingkat_masalah) }}</td>
            <td>{{ ucfirst($p->status) }}</td>
            <td>{{ $p->created_at->format('d/m/Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>

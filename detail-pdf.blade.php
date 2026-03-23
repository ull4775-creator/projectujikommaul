<!DOCTYPE html>
<html>
<head>
    <title>Surat Laporan Pengaduan {{ $data->kode }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header { text-align: center; }
        .logo { width: 80px; height: auto; }
        h2 { margin: 5px 0; }
        h3 { margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 5px; vertical-align: top; }
        .no-border { border: none; }
        .ttd { margin-top: 50px; width: 100%; }
        .ttd td { text-align: center; padding-top: 50px; }
    </style>
</head>
<body>
    <div class="header">
        @if(file_exists(public_path('logo.png')))
            <img src="{{ public_path('logo.png') }}" class="logo">
        @endif
        <h2>Perumda Air Minum Tirta Wibawa Kota Sukabumi</h2>
        <h3>Jl. Bhayangkara No. 207 Kota Sukabumi</h3>
        <hr>
        <h3><u>SURAT LAPORAN PENGADUAN</u></h3>
        <p>Kode Pengaduan: <strong>{{ $data->kode }}</strong></p>
    </div>

    <table>
        <tr>
            <td width="30%">No Sambungan</td>
            <td>: {{ $data->no_sa }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: {{ $data->nama_pengadu ?? '-' }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $data->alamat_lengkap }}</td>
        </tr>
        <tr>
            <td>Lokasi Kejadian</td>
            <td>: {{ $data->email }}</td>
        </tr>
        <tr>
            <td>Cabang</td>
            <td>: {{ $data->lokasi_daerah_cabang }}</td>
        </tr>
        <tr>
            <td>Tingkat Masalah</td>
            <td>: {{ ucfirst($data->tingkat_masalah) }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>: {{ ucfirst($data->status) }}</td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>: {{ $data->keterangan ?? '-' }}</td>
        </tr>
        @if($data->foto)
        <tr>
            <td>Foto</td>
            <td><img src="{{ public_path('storage/'.$data->foto) }}" width="300"></td>
        </tr>
        @endif
        <tr>
            <td>Tanggal Laporan</td>
            <td>: {{ $data->created_at->format('d/m/Y H:i') }}</td>
        </tr>
    </table>

    <table class="ttd">
        <tr>
            <td>Direktur</td>
            <td>Petugas</td>
        </tr>
        <tr>
            <td>(_________________)</td>
            <td>(_________________)</td>
        </tr>
    </table>
</body>
</html>

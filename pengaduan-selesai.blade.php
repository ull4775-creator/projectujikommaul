<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pengaduan Selesai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .header {
            background-color: #28a745;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            background-color: white;
            border-radius: 0 0 8px 8px;
        }
        .info-box {
            background-color: #f8f9fa;
            padding: 15px;
            border-left: 4px solid #28a745;
            margin: 20px 0;
        }
        .info-box p {
            margin: 5px 0;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #777;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            padding: 5px 0;
        }
        strong {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>✅ Pengaduan Selesai</h2>
        </div>
        
        <div class="content">
            <h3>Halo {{ $pengaduan->nama }},</h3>
            
            <p>Pengaduan Anda telah <strong>selesai</strong> ditangani oleh tim kami.</p>
            
            <div class="info-box">
                <p><strong>Nomor Pengaduan:</strong> {{ $pengaduan->kode ?? '-' }}</p>
                <p><strong>No. Sambungan:</strong> {{ $pengaduan->no_sa ?? '-' }}</p>
                <p><strong>Status:</strong> <span style="color: #28a745; font-weight: bold;">{{ ucfirst($pengaduan->status) }}</span></p>
            </div>

            <p><strong>Detail Pengaduan:</strong></p>
            <ul>
                <li><strong>Nama:</strong> {{ $pengaduan->nama }}</li>
                <li><strong>No. HP:</strong> {{ $pengaduan->no_hp ?? '-' }}</li>
                <li><strong>Alamat:</strong> {{ $pengaduan->alamat_lengkap ?? '-' }}</li>
                <li><strong>Keterangan:</strong> {{ $pengaduan->ket ?? '-' }}</li>
                @if($pengaduan->tingkat_masalah)
                    <li><strong>Tingkat Masalah:</strong> {{ ucfirst($pengaduan->tingkat_masalah) }}</li>
                @endif
            </ul>

            <p>Terima kasih telah melaporkan pengaduan Anda kepada Perumda Air Minum Tbw Kotasmi.</p>
            
            <p>Jika Anda memiliki pertanyaan lebih lanjut, silakan hubungi layanan pelanggan kami.</p>
        </div>

        <div class="footer">
            <p>Email otomatis - Mohon tidak membalas langsung ke alamat ini.</p>
            <p>&copy; {{ date('Y') }} Perumda Air Minum Tbw Kotasmi. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
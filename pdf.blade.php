<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>LAPORAN BULANAN PDAM TIRTA WIBAWA</title>
    <style>
        /* ===== RESET & BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
            background-color: #fff;
            padding: 30px 45px;
            width: 100%;
            max-width: 210mm;
        }

        /* ===== LETTERHEAD (RESMI) ===== */
        .letterhead {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 25px;
            position: relative;
        }
        .logo-section {
            width: 75px;
            height: 75px;
            border: 1.5px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 25px;
            flex-shrink: 0;
        }
        .logo-img {
            max-width: 60px;
            max-height: 60px;
            object-fit: contain;
        }
        .company-info {
            text-align: center;
            flex: 1;
        }
        .company-name-main {
            font-size: 16pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            line-height: 1.2;
            margin-bottom: 2px;
        }
        .company-name-sub {
            font-size: 14pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #0d4a82;
            line-height: 1.2;
            margin-bottom: 5px;
        }
        .company-location {
            font-size: 11pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 3px;
        }
        .company-address {
            font-size: 10.5pt;
            font-weight: normal;
            text-transform: none;
            letter-spacing: 0.3px;
        }

        /* ===== REPORT METADATA ===== */
        .report-title {
            font-size: 18pt;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            margin: 10px 0 8px;
            letter-spacing: 1.5px;
            line-height: 1.4;
        }
        .report-period {
            font-size: 12pt;
            text-align: center;
            margin-bottom: 3px;
        }
        .report-number {
            font-size: 11pt;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        .intro-text {
            text-align: justify;
            margin: 15px 0 25px;
            text-indent: 30px;
            line-height: 1.6;
        }

        /* ===== INFO CARDS ===== */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin: 20px 0 25px;
        }
        .info-card {
            border: 1px solid #000;
            padding: 8px 5px;
            font-size: 11.5px;
            text-align: center;
        }
        .info-label {
            font-weight: bold;
            display: block;
            margin-bottom: 2px;
            font-size: 10.5pt;
        }
        .info-value {
            font-weight: normal;
            font-size: 12.5pt;
            text-align: center;
            line-height: 1.3;
        }

        /* ===== SECTIONS ===== */
        .section-title {
            font-size: 14pt;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 1px solid #000;
            padding-bottom: 3px;
            margin: 25px 0 12px;
            letter-spacing: 0.5px;
        }
        .section-content {
            margin-bottom: 20px;
            text-align: justify;
            line-height: 1.6;
            text-indent: 30px;
        }
        .section-content p {
            margin-bottom: 8px;
        }

        /* ===== TABLES ===== */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 11pt;
        }
        table th {
            background-color: #f0f0f0;
            border: 1px solid #000;
            padding: 8px 6px;
            font-weight: bold;
            text-align: center;
            vertical-align: middle;
            font-size: 10.5pt;
        }
        table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
            vertical-align: middle;
            font-size: 10.5pt;
        }
        table tr:nth-child(even) {
            background-color: #fafafa;
        }
        .text-left { text-align: left !important; padding-left: 8px; }
        .text-center { text-align: center !important; }

        /* ===== SIGNATURE (KIRI & KANAN) ===== */
        .signature-area {
            margin-top: 65px;
            padding-top: 20px;
            border-top: 1px solid #000;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .signature-box {
            width: 45%;
            min-height: 120px;
            text-align: center;
        }
        .signature-left {
            text-align: left;
        }
        .signature-right {
            text-align: right;
        }
        .signature-title {
            font-weight: bold;
            margin-bottom: 32px;
            font-size: 11pt;
            line-height: 1.3;
        }
        .signature-line {
            border-top: 1px solid #000;
            width: 100%;
            margin: 0 auto 5px;
            max-width: 200px;
        }
        .signature-name {
            font-weight: bold;
            font-size: 11pt;
            margin-top: 5px;
            line-height: 1.3;
        }
        .signature-image {
            max-width: 180px;
            max-height: 55px;
            margin: 0 auto;
            display: block;
        }

        /* ===== FOOTER ===== */
        .footer {
            margin-top: 40px;
            padding-top: 15px;
            border-top: 1px solid #000;
            text-align: center;
            font-size: 10pt;
            color: #333;
            line-height: 1.4;
        }
        .footer-note {
            font-style: italic;
            margin-top: 5px;
            font-size: 9.5pt;
        }
        .footer-small {
            font-size: 9pt;
            margin-top: 3px;
        }

        /* ===== PRINT OPTIMIZATION ===== */
        @media print {
            body { padding: 30px 40px; }
            .page-break { page-break-after: always; }
        }
    </style>
</head>
<body>
    <!-- LETTERHEAD -->
    <div class="letterhead">
        <div class="logo-section">
            <img src="{{ public_path('dist/image/logo-pdam.png') }}" 
                 alt="Logo PDAM" 
                 class="logo-img"
                 onerror="this.style.display='none'; this.parentElement.style.display='flex'">
            <div class="logo-text-fallback" style="display:none; color:#0d4a82; font-size:26px; font-weight:bold">T</div>
        </div>
        <div class="company-info">
            <div class="company-name-main">perusahaan daerah air minum</div>
            <div class="company-name-sub">tirta wibawa</div>
            <div class="company-location">kota sukabumi</div>
            <div class="company-address">Jl. R. Syamsudin, S.H. No. 123, Kota Sukabumi 43114</div>
        </div>
    </div>

    <!-- REPORT METADATA -->
    <div class="report-title">laporan bulanan pengaduan pelanggan</div>
    <div class="report-period">Periode: {{ $namaBulan }} {{ $tahun }}</div>
    <div class="report-number">Nomor: PDAM/TW/{{ $tahun }}/{{ $bulan }}/{{ $cabang !== 'all' ? strtoupper(str_replace('_', '-', $cabang)) : 'ALL' }}/001</div>

    <!-- INTRODUCTION -->
    <p class="intro-text">
        Berdasarkan data sistem pengaduan Perumda Air Minum Tirta Wibawa Kota Sukabumi, dengan ini disampaikan laporan pengaduan gangguan pelayanan air bersih periode {{ $namaBulan }} {{ $tahun }} sebagai berikut:
    </p>

    <!-- KEY METRICS -->
    <div class="info-grid">
        <div class="info-card">
            <span class="info-label">TOTAL PENGADUAN</span>
            <div class="info-value">{{ number_format($totalPelaporan) }}</div>
        </div>
        <div class="info-card">
            <span class="info-label">TOTAL PELANGGAN</span>
            <div class="info-value">{{ number_format($totalPengguna) }}</div>
        </div>
        <div class="info-card">
            <span class="info-label">PERSENTASE SELESAI</span>
            <div class="info-value">{{ $persenSelesai }}%</div>
        </div>
        <div class="info-card">
            <span class="info-label">MENUNGGU (>24 JAM)</span>
            <div class="info-value">{{ number_format($menunggu) }}</div>
        </div>
        <div class="info-card">
            <span class="info-label">CABANG</span>
            <div class="info-value">{{ $namaCabang }}</div>
        </div>
        <div class="info-card">
            <span class="info-label">KATEGORI</span>
            <div class="info-value">{{ $namaKategori ?: 'Semua Kategori' }}</div>
        </div>
    </div>

    <!-- DISTRIBUTION TABLE -->
    <div class="section-title">distribusi pengaduan per cabang</div>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%" class="text-left">Cabang</th>
                <th width="12%">Total</th>
                <th width="12%">Selesai</th>
                <th width="12%">Proses</th>
                <th width="12%">Menunggu</th>
                <th width="12%">Persentase Selesai</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $row)
                @php
                    $total = $row->proses + $row->selesai;
                    $persen = $total > 0 ? round(($row->selesai / $total) * 100, 1) : 0;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-left">{{ ucwords(str_replace('_', ' ', $row->cabang)) }}</td>
                    <td>{{ $row->total }}</td>
                    <td>{{ $row->selesai }}</td>
                    <td>{{ $row->proses }}</td>
                    <td>{{ $row->menunggu }}</td>
                    <td>{{ $persen }}%</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-3">
                        <em>Tidak terdapat data pengaduan pada periode dan filter yang dipilih</em>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- ANALYSIS -->
    <div class="section-title">analisis kinerja</div>
    <div class="section-content">
        <p>
            Kinerja penanganan pengaduan pada bulan {{ $namaBulan }} {{ $tahun }} menunjukkan tingkat penyelesaian sebesar {{ $persenSelesai }}%. 
            {{ $namaCabang !== 'Semua Cabang' ? 'Cabang ' . $namaCabang : 'Seluruh cabang' }} 
            menunjukkan kinerja {{ $persenSelesai >= 80 ? 'sangat baik' : ($persenSelesai >= 60 ? 'cukup baik' : 'perlu peningkatan signifikan') }} 
            dalam penanganan pengaduan pelanggan. Capaian ini mencerminkan komitmen Perumda Air Minum Tirta Wibawa dalam memberikan pelayanan prima kepada masyarakat Kota Sukabumi.
        </p>
    </div>

    <!-- RECOMMENDATIONS -->
    <div class="section-title">rekomendasi</div>
    <div class="section-content">
        <p>1. Meningkatkan responsivitas penanganan pengaduan di cabang dengan persentase penyelesaian di bawah 80%</p>
        <p>2. Memperkuat koordinasi antar cabang untuk penanganan pengaduan kompleks yang memerlukan penanganan lintas wilayah</p>
        <p>3. Mempercepat proses verifikasi dan penyelesaian pengaduan melalui optimalisasi sistem digital dan peningkatan kapasitas SDM</p>
        <p>4. Melakukan evaluasi berkala terhadap akar permasalahan pengaduan berulang untuk pencegahan jangka panjang</p>
    </div>

    <!-- CLOSING -->
    <div class="section-title">penutup</div>
    <div class="section-content">
        <p>
            Demikian laporan bulanan ini disusun sebagai bahan evaluasi kinerja dan pengambilan keputusan. 
            Atas perhatian dan kerja sama seluruh pihak terkait, kami sampaikan terima kasih.
        </p>
    </div>

    <!-- SIGNATURE (KIRI & KANAN) -->
    <div class="signature-area">
        <!-- DIREKTUR - KIRI -->
        <div class="signature-box signature-left">
            <div class="signature-title">Mengetahui,</div>
            <div class="signature-title">Direktur Utama</div>
            <img src="{{ public_path('dist/image/ttd_direktur.png') }}" 
                 alt="Tanda Tangan Direktur" 
                 class="signature-image"
                 onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
            <div class="signature-line" style="display:none"></div>
            <div class="signature-name">Drs. H. Asep Suhendar, M.M.</div>
        </div>
        
        <!-- KEPALA BAGIAN - KANAN -->
        <div class="signature-box signature-right">
            <div class="signature-title">Dibuat oleh,</div>
            <div class="signature-title">Kepala Bagian Pengaduan Pelanggan</div>
            <img src="{{ public_path('dist/image/ttd_kepala.png') }}" 
                 alt="Tanda Tangan Kepala" 
                 class="signature-image"
                 onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
            <div class="signature-line" style="display:none"></div>
            <div class="signature-name">Dian Purnama, S.T.</div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <div class="footer-small">Laporan ini disusun berdasarkan data sistem pengaduan Perumda Air Minum Tirta Wibawa Kota Sukabumi</div>
        <div class="mt-2">Dicetak pada: {{ now()->locale('id')->isoFormat('D MMMM Y, HH:mm') }} WIB | Halaman 1 dari 1</div>
        <div class="footer-note mt-2">Catatan: Dokumen ini bersifat internal dan hanya untuk keperluan evaluasi kinerja serta pengambilan keputusan manajerial</div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Laporan Dashboard Staydesa</title>
    <style>
        @page {
            margin: 15mm;
            size: A4;
        }
        body { 
            font-family: Arial, sans-serif;
            color: #000;
            background: #fff;
            line-height: 1.5;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #000;
        }
        .header h1 {
            margin: 0 0 8px 0;
            font-size: 20px;
            font-weight: bold;
        }
        .header p {
            margin: 0;
            font-size: 13px;
        }
        .logo {
            text-align: center;
            margin-bottom: 10px;
        }
        .logo h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
        .report-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 8px 12px;
            border: 1px solid #000;
        }
        .report-info div {
            font-size: 12px;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            margin: 20px 0 10px 0;
            border-bottom: 1px solid #000;
            padding-bottom: 4px;
        }
        .performance-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }
        .metric-card {
            padding: 10px;
            border: 1px solid #000;
        }
        .metric-card .label {
            font-size: 11px;
            margin-bottom: 4px;
        }
        .metric-card .value {
            font-size: 16px;
            font-weight: bold;
        }
        .metric-card .subtext {
            font-size: 11px;
            margin-top: 2px;
        }
        .highlight {
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
            margin-bottom: 25px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
        th {
            background: #ddd;
            font-weight: bold;
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .status {
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 10px;
            font-weight: bold;
            display: inline-block;
            text-align: center;
        }
        .status-selesai {
            background: #28a745; 
            color: white;
        }
        .status-dibayar {
            background: #17a2b8; 
            color: white;
        }
        .status-dipesan {
            background: #ffc107; 
            color: #000;
        }
        .currency {
            font-weight: bold;
        }
        .footer {
            font-size: 10px;
            text-align: center;
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #000;
        }
    </style>
</head>
<body>
    <div class="logo">
        <h2>STAYDESA</h2>
    </div>

    <div class="header">
        <h1>Laporan Performa Bisnis</h1>
        <p>Analisis Data Reservasi dan Kinerja Bulanan</p>
    </div>

    <div class="report-info">
        <div><strong>Periode:</strong> {{ now()->subDays(30)->format('d M Y') }} - {{ now()->format('d M Y') }}</div>
        <div><strong>Dibuat:</strong> {{ now()->format('d M Y, H:i') }}</div>
    </div>

    <div class="section-title">Ringkasan Kinerja</div>

    <div class="performance-grid">
        <div class="metric-card">
            <div class="label">Total Reservasi</div>
            <div class="value">{{ $totalReservasi }}</div>
            <div class="subtext">
                <span class="{{ $percentageChange >= 0 ? 'highlight' : '' }}">
                    {{ $percentageChange >= 0 ? '+' : '' }}{{ number_format($percentageChange, 2) }}%
                </span>
            </div>
        </div>

        <div class="metric-card">
            <div class="label">Pengguna Terdaftar</div>
            <div class="value">{{ $totalUsers }}</div>
            <div class="subtext">
                <span class="{{ $percentageChangeUsers >= 0 ? 'highlight' : '' }}">
                    {{ $percentageChangeUsers >= 0 ? '+' : '' }}{{ number_format($percentageChangeUsers, 2) }}%
                </span>
            </div>
        </div>

        <div class="metric-card">
            <div class="label">Paket Wisata</div>
            <div class="value">{{ $totalPaketWisata }}</div>
            <div class="subtext">
                <span class="{{ $percentageChangePaket >= 0 ? 'highlight' : '' }}">
                    {{ $percentageChangePaket >= 0 ? '+' : '' }}{{ number_format($percentageChangePaket, 2) }}%
                </span>
            </div>
        </div>

        <div class="metric-card">
            <div class="label">Total Pendapatan</div>
            <div class="value">Rp <span class="currency">{{ number_format($totalPendapatan, 0, ',', '.') }}</span></div>
            <div class="subtext">
                <span class="{{ $percentageChangePendapatan >= 0 ? 'highlight' : '' }}">
                    {{ $percentageChangePendapatan >= 0 ? '+' : '' }}{{ number_format($percentageChangePendapatan, 2) }}%
                </span>
            </div>
        </div>
    </div>

    <div class="section-title">Detail Reservasi Terkini</div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Status</th>
                <th class="text-right">Total Bayar</th>
                <th>Tanggal Reservasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservasis as $index => $reservasi)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ optional($reservasi->pelanggan->user)->name ?? 'Guest' }}</td>
                <td>
                    @if($reservasi->status_reservasi_wisata == 'selesai')
                        <span class="status status-selesai">Selesai</span>
                    @elseif($reservasi->status_reservasi_wisata == 'dibayar')
                        <span class="status status-dibayar">Dibayar</span>
                    @else
                        <span class="status status-dipesan">Dipesan</span>
                    @endif
                </td>
                <td class="text-right">Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</td>
                <td>{{ $reservasi->created_at->format('d M Y, H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        &copy; {{ date('Y') }} Staydesa • Laporan ini dibuat otomatis oleh sistem
    </div>
</body>
</html>

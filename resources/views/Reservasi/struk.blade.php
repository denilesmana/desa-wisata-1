<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Struk Reservasi - {{ $reservasi->id }}</title>
    <style>
        body { 
            font-family: Arial, sans-serif;
            font-size: 14px;  /* Diperbesar dari 12px */
            background-color: white;
            padding: 15px;    /* Diperbesar dari 10px */
            margin: 0;
        }
        .struk-container {
            max-width: 500px;  /* Diperbesar dari 400px */
            margin: 0 auto;
            background: white;
            padding: 20px;     /* Diperbesar dari 15px */
            border: 1px solid #ddd;
        }
        .header { 
            text-align: center; 
            margin-bottom: 20px; /* Diperbesar dari 15px */
            padding-bottom: 15px; /* Diperbesar dari 10px */
            border-bottom: 1px solid #000;
        }
        .header h2 {
            color: #000;
            margin: 0;
            font-size: 22px;   /* Diperbesar dari 18px */
            font-weight: bold;
            text-transform: uppercase;
        }
        .header p {
            color: #000;
            margin: 8px 0 0;   /* Diperbesar dari 5px */
            font-size: 13px;  /* Diperbesar dari 11px */
        }
        .info { 
            margin-bottom: 20px; /* Diperbesar dari 15px */
            padding: 0;
        }
        .info p {
            margin: 8px 0;     /* Diperbesar dari 5px */
            display: flex;
        }
        .info span {
            font-weight: bold;
            color: #000;
            min-width: 100px;  /* Diperbesar dari 90px */
            display: inline-block;
        }
        table {
            width: 100%; 
            border-collapse: collapse; 
            margin: 20px 0;   /* Diperbesar dari 15px */
            font-size: 13px;  /* Diperbesar dari 11px */
        }
        th {
            background-color: #f2f2f2;
            color: #000;
            padding: 10px;    /* Diperbesar dari 8px */
            text-align: left;
            border-bottom: 1px solid #000;
            font-weight: bold;
        }
        td { 
            padding: 10px;   /* Diperbesar dari 8px */
            border-bottom: 1px solid #ddd;
        }
        .text-right { 
            text-align: right; 
        }
        .total-row {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .footer {
            margin-top: 20px; /* Diperbesar dari 15px */ 
            text-align: center; 
            font-size: 12px;  /* Diperbesar dari 10px */
            color: #000;
            padding-top: 15px; /* Diperbesar dari 10px */
            border-top: 1px solid #000;
        }
        .logo {
            font-size: 24px;  /* Diperbesar dari 20px */
            font-weight: bold;
            color: #000;
            margin-bottom: 8px; /* Diperbesar dari 5px */
        }
    </style>
</head>
<body>
    <div class="struk-container">
        <div class="header">
            <div class="logo">Staydesa</div>
            <h2>STRUK RESERVASI</h2>
            <p>No: #{{ str_pad($reservasi->id, 6, '0', STR_PAD_LEFT) }}</p>
        </div>
        
        <div class="info">
            <p><span>Tanggal:</span> {{ $reservasi->created_at->format('d/m/Y H:i') }}</p>
            <p><span>Pelanggan:</span> {{ $reservasi->pelanggan->user->name }}</p>
            <p><span>Paket Wisata:</span> {{ $reservasi->paketWisata->nama_paket }}</p>
            <p><span>Status:</span> <strong>LUNAS</strong></p>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th class="text-right">Harga</th>
                    <th class="text-right">Jumlah</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $reservasi->paketWisata->nama_paket }}</td>
                    <td class="text-right">Rp {{ number_format($reservasi->harga, 0, ',', '.') }}</td>
                    <td class="text-right">{{ $reservasi->jumlah_peserta }}</td>
                    <td class="text-right">Rp {{ number_format($reservasi->harga * $reservasi->jumlah_peserta, 0, ',', '.') }}</td>
                </tr>
                @if($reservasi->diskon > 0)
                <tr>
                    <td colspan="3">Diskon {{ $reservasi->diskon }}%</td>
                    <td class="text-right">- Rp {{ number_format($reservasi->nilai_diskon, 0, ',', '.') }}</td>
                </tr>
                @endif
                <tr class="total-row">
                    <td colspan="3">TOTAL PEMBAYARAN</td>
                    <td class="text-right">Rp {{ number_format($reservasi->total_bayar, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        
        <div class="footer">
            <p>Terima kasih telah menggunakan layanan kami</p>
            <p>Struk ini merupakan bukti transaksi yang sah</p>
            <p style="margin-top: 8px;">&copy; {{ date('Y') }} Staydesa Travel</p>
        </div>
    </div>
</body>
</html>
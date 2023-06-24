<!DOCTYPE html>
<html>
<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            text-align: left;
            border-bottom: 1px dotted #999;
        }

        .footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Laundry</h2>
    </div>

    <div class="content">
        <table>
            @php($no = 1)
            @foreach($transaksi as $row)
                <tr>
                    <td colspan="2" style="text-align: center;"><strong>No: {{ $no++ }}</strong></td>
                </tr>
                    <td><strong>ID Transaksi:</strong></td>
                    <td>{{ $row->invoice }}</td>
                </tr>
                <tr>
                    <td><strong>Nama:</strong></td>
                    <td>{{ $row->user->nama }}</td>
                </tr>
                <tr>
                    <td><strong>Jadwal Kereta:</strong></td>
                    <td>
                        @if ($row->id_jadwal && $row->jadwal->rute->stasiun)
                          {{ $row->jadwal->rute->stasiun->nama_stasiun }} - {{ $row->jadwal->rute->stasiun_tujuan }}
                        @endif
                      </td>
                </tr>
                <tr>
                    <td><strong>Kursi:</strong></td>
                    <td>{{ $row->kursi->nama_kursi }}</td>
                </tr>
                <tr>
                    <td><strong>Metode Pembayaran:</strong></td>
                    <td>{{ $row->metode_pembayaran->metode_pembayaran }}</td>
                </tr>
                <tr>
                    <td><strong>Total Harga:</strong></td>
                    <td>{{ $row->jadwal->harga }}</td>
                </tr>
                <tr>
                    <td><strong>Bukti Pembayaran:</strong></td>
                    <td><img src="{{ asset('storage/' .$row->bukti_pembayaran) }}" alt="Bukti Pembayaran"></td>
                </tr>
                <tr>
                    <td><strong>Status Pembayaran:</strong></td>
                    <td>{{ $row->status_bayar }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="border-top: 1px dotted #999;"></td>
                </tr>
                <tr>
                    <td colspan="2" style="height: 10px;"></td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="footer">
        <p>Terima kasih atas kunjungan Anda</p>
    </div>
</body>
</html>

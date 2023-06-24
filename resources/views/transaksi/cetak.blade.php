<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 9pt;
            color: #333;
            background-color: #f9f9f9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #b3d7ff;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #e5e5e5;
        }

        h4 {
            margin-bottom: 20px;
            text-align: center;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 100px;
            border-radius: 50%;
        }

        .center {
            text-align: center;
        }

        .date-cell {
            white-space: nowrap;
        }

        .date-cell span {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 4px;
            background-color: #f2f2f2;
            font-size: 8pt;
        }

        .highlight {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="logo-container">
        <h1 class="d-flex align-items-center" class="text-primary">JESJESPOR</h1>
    </div>
    <h4>LAPORAN TRANSAKSI JESJESPOR</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Invoice</th>
                <th>User</th>
                <th>Jadwal Kereta Api</th>
                <th>Kursi</th>
                <th>Metode Pembayaran</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @php($no = 1)
            @foreach ($data as $row)
                <tr>
                    <th>{{ $no++ }}</th>
                    <td>{{ $row->invoice }}</td>
                    <td>{{ $row->user->nama }}</td>
                    <td>
                    @if ($row->id_jadwal && $row->jadwal->rute->stasiun)
                        {{ $row->jadwal->rute->stasiun->nama_stasiun }} - {{ $row->jadwal->rute->stasiun_tujuan }}
                    @endif
                    </td>
                    <td>{{ $row->kursi->nama_kursi }}</td>
                    <td>{{ $row->metode_pembayaran->metode_pembayaran }}</td>
                    <td>{{ $row->jadwal->harga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

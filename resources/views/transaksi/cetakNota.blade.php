<!DOCTYPE html>
<html>
<head>
    <title>Nota Laundry</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            padding: 20px;
            background-color: #f0f5f9;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img{
            margin-bottom: 10px;
            width:70px;
            height:70px;
            float:left;
            margin-right: 10px;
            border-radius:50%;
        }

        .content {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4287f5;
            color: #fff;
        }

        .footer {
            text-align: center;
            color: #777;
        }

        .total {
            float: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
    <img src="{{ public_path('images/logo.jpeg') }}" alt="Logo">
        <h2 style="color: black;">Nota Laundry</h2>
    </div>

    <div class="content">
        @php($no = 1)
        @php($total = 0)
        @foreach($transaksi as $row)
            @if($no == 1)
            <table>
                <th>No</th>
                <th>Invoice</th>
                <th>ID User</th>
                <th>ID Jadwal</th>
                <th>ID Metode Pembayaran</th>
                <th>Total Harga</th>
                <th>Status Pembayaran</th>

                <th>Aksi</th>
                  @endif
              </tr>
            </thead>
            <tbody>
              @php($no = 1)
              @foreach ($data as $row)
                <tr>
                  <th>{{ $no++ }}</th>
                  <td>{{ $row->invoice }}</td>
                  <td>{{ $row->user->nama }}</td>
                  <td>{{ $row->id_jadwal->id_jadwal }}</td>
                  <td>{{ $row->id_metode_pembayaran->id_metode_pembayaran }}</td>
                  <td>{{ $row->jadwal->harga }}</td>
                  <td>{{ $row->status_bayar }}</td>
            </tr>
        @endforeach
        </table>
    </div>
    <div class="footer">
        <p>Terima kasih atas kunjungan Anda</p>
    </div>
</body>
</html>

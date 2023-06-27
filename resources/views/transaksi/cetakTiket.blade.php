<!DOCTYPE html>
<html>
<head>
    <title>Boarding Pass KAI</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            padding: 20px;
            background-color: #f0f5f9;
        }

        .boarding-pass {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 60%;
            height: 10%;
            border-radius: 50%;
        }

        .pass-title {
            text-align: center;
            font-size: 18pt;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .pass-info {
            margin-bottom: 20px;
        }

        .pass-info-row {
            display: flex;
            margin-bottom: 10px;
        }

        .pass-info-label {
            flex: 1;
            font-weight: bold;
        }

        .pass-info-value {
            flex: 2;
        }

        .pass-footer {
            text-align: center;
            color: #777;
        }

        .pass-footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="boarding-pass">
        <div class="logo">
        <img src="{{ asset('img/jesjespor logo biru.png') }}" alt="Logo">
        </div>

        <div class="pass-info">
            @foreach($transaksi as $row)
            <div class="pass-info-row">
                <h3><div class="pass-info-value">{{ $row->jadwal->kereta->nama_kereta }}({{ $row->jadwal->kereta->jenis_kereta }})</div></h3>
            </div>
<br>
            <div class="pass-info-row">
                <div class="pass-info-label">Kode Booking</div>
                <div class="pass-info-value">{{ $row->invoice }}</div>
            </div>
            <div class="pass-info-row">
                <div class="pass-info-value">{{ $row->jadwal->rute->stasiun->nama_stasiun }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $row->jadwal->rute->stasiun_tujuan }}
                <h3><div class="pass-info-value"><b>{{ $row->jadwal->waktu_berangkat }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>{{ $row->jadwal->waktu_tiba }}</b></h3>
                {{ $row->jadwal->tanggal }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $row->jadwal->tanggal }}</div>
            </div>
            <br>
            <div class="pass-info-row">
                <div class="pass-info-label">Penumpang</div>
                <div class="pass-info-value">{{ $row->user->nama }}</div>
            </div>
            <div class="pass-info-row">
                <div class="pass-info-label">No. ID</div>
                <div class="pass-info-value">{{ $row->user->nik }}</div>
            </div>
            <div class="pass-info-row">
                <div class="pass-info-label">No Kursi</div>
                <div class="pass-info-value">{{ $row->gerbong->nama_gerbong }} / {{ $row->kursi->nama_kursi }}</div>
            </div>
            <div class="pass-info-row">

            </div>

            <br>
        <div class="pass-footer">
        <p>Pindai Barcode Ini Di Gerbang</p>
        </div>
<br>
        <center>
        <img src="{{ asset('img/barcode.jpeg') }}" alt="Logo" height="40%" width="35%">
        <div class="pass-footer">
            <br><br>
            <p>Terima kasih atas kunjungan Anda</p>
        </div>
    </center>
    </div>
            @endforeach
        </div>


</body>
</html>

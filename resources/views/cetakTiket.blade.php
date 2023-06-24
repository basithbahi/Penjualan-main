<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Tiket</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h5 class="card-title" style="margin-bottom: 0; color: #fff;">JADWAL KERETA</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Jadwal</th>
                                <th>Admin</th>
                                <th>Jadwal Kereta</th>
                                <th>Jadwal Rute (Stasiun)</th>
                                <th>Harga Perjalanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @foreach ($data as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->id_jadwal }}</td>
                                <td>{{ $row->nik }}</td>
                                <td>{{ $row->kereta->nama_kereta }} - {{ $row->kereta->jenis_kereta }}</td>
                                <td>{{ $row->rute->stasiun->nama_stasiun }} - {{ $row->rute->stasiun_tujuan }}</td>
                                <td>{{ $row->harga }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="gap-row"></div> <!-- Add the gap row -->
                @php($no = 1)
                @foreach ($data as $row)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-2">{{ $no++ }}</div>
                        <div class="col-2">{{ $row->kereta->nama_kereta }}</div>
                        <div class="col-3">{{ $row->rute->stasiun->nama_stasiun }}</div>
                        <div class="col-2">{{ $row->rute->stasiun_tujuan }}</div>
                        <div class="col-2" style="color: #118C4F;"><strong>Rp {{ $row->harga }}</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-2">{{ $row->kereta->jenis_kereta }}</div>
                        <div class="col-3">{{ $row->waktu_berangkat }}</div>
                        <div class="col-2">{{ $row->waktu_tiba }}</div>
    
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-2"></div>
                        <div class="col-3">{{ $row->tanggal }}</div>
                        <div class="col-2">{{ $row->tanggal }}</div>
                        <div class="col-2"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>

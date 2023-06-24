<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal Kereta</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f4f6f9;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .card {
      margin-bottom: 20px;
      border-radius: 5px;
      border: none;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: darkblue ;
      border-bottom: 1px solid #e1e5eb;
      padding: 15px;
      color: #fff;
    }

    .card-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 0;
    }

    .card-body {
      padding: 0;
    }

    .list-group-item {
      background-color: #fff;
      border-bottom: 1px solid #e1e5eb;
    }

    .list-group-item:last-child {
      border-bottom: none;
    }

    .list-group-item:hover {
      background-color: #edf2f7;
    }

    .btn-primary {
      background-color: #fd7e14;
      border-color: #fd7e14;
    }

    .btn-primary:hover {
      background-color: #fd8c23;
      border-color: #fd8c23;
    }

    .btn-primary:focus,
    .btn-primary.focus {
      box-shadow: 0 0 0 0.2rem rgba(253, 126, 20, 0.5);
    }

    .gap-row {
      height: 10px; /* Adjust the height as needed */
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-header text-center">
        <h5 class="card-title" style="margin-bottom: 0; color: #fff;">JADWAL KERETA</h5>
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
          <div class="col-2" style="color: #118C4F;"><strong>Rp {{ $row->harga }}</strong></div><br>
        </div>
        <div class="row">
          <div class="col-2"></div>
          <div class="col-2">{{ $row->kereta->jenis_kereta }}</div>
          <div class="col-3">{{ $row->waktu_berangkat }}</div>
          <div class="col-2">{{ $row->waktu_tiba }}</div>
          <div class="col-1"><a href="{{ route('transaksi.tambahCustomer', ['id' => $row->id, 'harga' => $row->harga]) }}" class="btn btn-primary btn-block">Pilih</a></div>
        </div>
        <div class="row">
          <div class="col-2"></div>
          <div class="col-2"></div>
          <div class="col-3">{{ $row->tanggal }}</div>
          <div class="col-2">{{ $row->tanggal }}</div>
          <div class="col-2"></div>
        </div>
      </div>
=======
        <h5 class="card-title" style="margin-bottom: 0; color: #fff;">Kereta</h5>
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
                <th>{{ $no++ }}</th>
                <td>{{ $row->id_jadwal }}</td>
                <td>{{ $row->nik }}</td>
                <td>{{ $row->kereta->nama_kereta }} - {{ $row->kereta->jenis_kereta }}</td>
                <td>{{ $row->rute->stasiun->nama_stasiun }} - {{ $row->rute->stasiun_tujuan }}</td>
                <td>{{ $row->harga }}</td>
                <td>
                    <a href="{{ route('transaksi.tambahCustomer', ['id' => $row->id_jadwal, 'harga' => $row->harga]) }}" class="btn btn-success">PILIH</a>                
                  </td>
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
          <div class="col-2"><strong>Rp {{ $row->harga }}</strong></div><br>
        </div>
        <div class="row">
          <div class="col-2"></div>
          <div class="col-2">{{ $row->kereta->jenis_kereta }}</div>
          <div class="col-3">{{ $row->waktu }}</div>
          <div class="col-2">{{ $row->waktu_tiba }}</div>
          <div class="col-1"><a href="{{ route('transaksi.tambahCustomer', ['id' => $row->id, 'harga' => $row->harga]) }}" class="btn btn-primary btn-block">Pilih</a></div>
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
</body>

</html>

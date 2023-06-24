    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    </head>

    <body>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <form action="{{ route('transaksi.searchIndex') }}" method="GET">
            <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" name="query" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
            </div>
        </form>
        </div>

        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
              <th>No</th>
              <th>Invoice</th>
              <th>User</th>
              <th>Jadwal Kereta Api</th>
              <th>Kursi</th>
              <th>Metode Pembayaran</th>
              <th>Total Harga</th>
              <th>Total Bayar</th>
              <th>Aksi</th>
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
                <td>{{ $row->total_bayar }}</td>
                <td class="@if ($row->jadwal->tanggal > date('m-d-Y')) inactive @else active @endif">
                @if ($row->jadwal->tanggal > date('m-d-Y'))
                    Tidak Aktif
                @else
                    Aktif
                @endif
            </td>
                </tr>
                @endforeach
                @if (count($data) == 0)
            <tr>
            <td colspan="8">Tiket tidak ditemukan.</td>
            </tr>
        @endif
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </body>
    </html>
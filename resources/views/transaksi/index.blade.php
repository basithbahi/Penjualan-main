@extends('layouts.app')

@section('title', 'Data Transaksi')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="{{ route('transaksi.search') }}" method="GET">
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
			@if (auth()->user()->level == 'Admin')
      <a href="{{ route('transaksi.tambah') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Transaksi</a>
			@endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            @if (auth()->user()->level == 'Admin')
            <tr>
              <th>No</th>
              <th>Invoice</th>
              <th>User</th>
              <th>Jadwal Kereta Api</th>
              <th>Kursi</th>
              <th>Metode Pembayaran</th>
              <th>Total Harga</th>
              <th>Total Bayar</th>
              <th>Metode Pembayaran</th>
              <th>Total Harga</th>
              <th>Total Bayar</th>
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
                <td>
                  @if ($row->id_jadwal && $row->jadwal->rute->stasiun)
                    {{ $row->jadwal->rute->stasiun->nama_stasiun }} - {{ $row->jadwal->rute->stasiun_tujuan }}
                  @endif
                </td>
                <td>{{ $row->id_kursi }}</td>
                <td>{{ $row->metode_pembayaran->metode_pembayaran }}</td>
                <td>{{ $row->jadwal->harga }}</td>
                <td>{{ $row->total_bayar }}</td>
                <td>{{ $row->metode_pembayaran->metode_pembayaran }}</td>
                <td>{{ $row->jadwal->harga }}</td>
                <td>{{ $row->total_bayar }}</td>
				        @if (auth()->user()->level == 'Admin')
                    <td>
                        <a href="{{ route('transaksi.edit', $row->id) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        <a href="{{ route('transaksi.hapus', $row->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt "></i></a>
                        <!-- <a href="{{ route('riwayat_transaksi.bayar', $row->id) }}" class="btn btn-info"><i class="fas fa-money-bill "></i></a> -->
                    </td>
                @else
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

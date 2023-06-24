@extends('layouts.cekTransaksi')

@section('contents')

<style>
  .disabled-button {
  background-color: #6eaa5e;
  color: white;
}
.button {
  background-color: #9999FF;
  color: white;
}
</style>
  <div class="card shadow mb-4">


    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Invoice</th>
              <th>User</th>
              <th>Jadwal</th>
              <th>Gerbong</th>
              <th>Kursi</th>
              <th>Metode Pembayaran</th>
              <th>Total Bayar</th>
              <th>Status Bayar</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($data as $row)
              @if (auth()->check() && $row->user->id === auth()->user()->id) <!-- Check if user is authenticated and the transaction belongs to the logged-in user -->
                <tr>
                    <th>{{ $no++ }}</th>
                    <td>{{ $row->invoice }}</td>
                    <td>{{ $row->user->nama }}</td>
                    <td>{{ $row->id_jadwal }}</td>
                    <td>{{ $row->gerbong->nama_gerbong }}</td>
                    <td>{{ $row->kursi->nama_kursi }}</td>
                    <td>{{ $row->metode_pembayaran->metode_pembayaran }}</td>
                    <td>{{ $row->total_bayar }}</td>
                  @if ($row->status_bayar === 'LUNAS')
                  <td><button class="disabled-button" disabled>{{ $row->status_bayar }}</button></td>
                  @else
                  <td><button class="button" disabled>{{ $row->status_bayar }}</button></td>
                </tr>
              @endif
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

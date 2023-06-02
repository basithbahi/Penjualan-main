@extends('layouts.app')

@section('title', 'Data Jadwal')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="{{ route('jadwal.search') }}" method="GET">
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
      <a href="{{ route('jadwal.tambah') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah jadwal</a>
      @endif

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Jadwal</th>
              <th>Admin</th>
              <th>Jadwal Kereta</th>
              <th>Jadwal Rute</th>
              <th>Harga Perjalanan</th>
              <th>Tanggal Keberangkatan</th>
              <th>Waktu Keberangkatan</th>

              @if (auth()->user()->level == 'Admin')
              <th>Aksi</th>
              @endif
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
                <td>{{ $row->rute->stasiun->nama_stasiun }} -{{ $row->rute->stasiun_tujuan }}</td>
                <td>{{ $row->harga }}</td>
                <td>{{ $row->tanggal_keberangkatan }}</td>
                <td>{{ $row->waktu_keberangkatan }}</td>
                @if (auth()->user()->level == 'Admin')
                <td>
                    <a href="{{ route('jadwal.edit', $row->id) }}" class="btn btn-warning">Edit &nbsp;&nbsp;&nbsp;<i class="fas fa-pen"></i></a>
                    <a href="{{ route('jadwal.hapus', $row->id) }}" class="btn btn-danger">Hapus &nbsp;&nbsp;&nbsp;<i class="fas fa-trash-alt "></i></a>
                </td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

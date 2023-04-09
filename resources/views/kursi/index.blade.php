@extends('layouts.app')

@section('title', 'Data Kursi')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Kursi</h6>
    </div>
    <div class="card-body">
			@if (auth()->user()->level == 'Admin')
      <a href="{{ route('kursi.tambah') }}" class="btn btn-primary mb-3">Tambah Kursi</a>
			@endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Kursi</th>
              <th>Nama Kursi</th>
              <th>Kursi Gerbong</th>
              <th>Kursi Kereta</th>
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
                <td>{{ $row->id_kursi }}</td>
                <td>{{ $row->nama_kursi }}</td>
                <td>{{ $row->gerbong->nama_gerbong }}</td>
                <td>{{ $row->kereta->nama_kereta }}</td>
				@if (auth()->user()->level == 'Admin')
                    <td>
                        <a href="{{ route('kursi.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('kursi.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
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
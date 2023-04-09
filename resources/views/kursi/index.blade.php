@extends('layouts.app')

@section('title', 'Data Kursi')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="{{ route('kursi.search') }}" method="GET">
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
      <a href="{{ route('kursi.tambah') }}" class="btn btn-primary mb-3">Tambah Kursi</a>
			@endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Kursi</th>
              <th>Nama Kursi</th>
              <th>Kursi Gerbong - Kereta</th>
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
                <td>{{ $row->gerbong->nama_gerbong }} - {{ $row->gerbong->kereta->nama_kereta }}</td>
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

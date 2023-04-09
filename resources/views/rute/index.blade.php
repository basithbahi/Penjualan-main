@extends('layouts.app')

@section('title', 'Data Rute')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Rute</h6>
    </div>
    <div class="card-body">
			@if (auth()->user()->level == 'Admin')
      <a href="{{ route('rute.tambah') }}" class="btn btn-primary mb-3">Tambah Rute</a>
			@endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Rute</th>
              <th>Stasiun Keberangkatan</th>
              <th>Stasiun Tujuan</th>
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
                <td>{{ $row->id_rute }}</td>
                <td>{{ $row->stasiun->nama_stasiun}}</td>
                <td>{{ $row->stasiun_tujuan }}</td>
								@if (auth()->user()->level == 'Admin')
                <td>
                  <a href="{{ route('rute.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                  <a href="{{ route('rute.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
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

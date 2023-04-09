@extends('layouts.app')

@section('title', 'Data Stasiun')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Stasiun</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('stasiun.tambah') }}" class="btn btn-primary mb-3">Tambah Stasiun</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Stasiun</th>
              <th>Nama Stasiun</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($stasiun as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->id_stasiun }}</td>
                <td>{{ $row->nama_stasiun }}</td>
                <td>
                  <a href="{{ route('stasiun.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                  <a href="{{ route('stasiun.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

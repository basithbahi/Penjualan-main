@extends('layouts.app')

@section('title', 'Data Kereta')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Kereta</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('kereta.tambah') }}" class="btn btn-primary mb-3">Tambah Kereta</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Kereta</th>
              <th>Nama Kereta</th>
              <th>Jenis Kereta</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($kereta as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->id_kereta }}</td>
                <td>{{ $row->nama_kereta }}</td>
                <td>{{ $row->jenis_kereta }}</td>
                <td>
                  <a href="{{ route('kereta.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                  <a href="{{ route('kereta.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

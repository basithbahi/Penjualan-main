@extends('layouts.app')

@section('title', 'Data Kereta')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="{{ route('kereta.search') }}" method="GET">
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
        <a href="{{ route('kereta.tambah') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Kereta</a>
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Kereta</th>
              <th>Nama Kereta</th>
              <th>Jenis Kereta</th>
              <th>Harga Perjalanan</th>
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
                <td>{{ $row->harga }}</td>
                <td>
                    <a href="{{ route('kereta.edit', $row->id) }}" class="btn btn-warning">Edit &nbsp;&nbsp;&nbsp;<i class="fas fa-pen"></i></a>
                    <a href="{{ route('kereta.hapus', $row->id) }}" class="btn btn-danger">Hapus &nbsp;&nbsp;&nbsp;<i class="fas fa-trash-alt "></i></a>
            </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

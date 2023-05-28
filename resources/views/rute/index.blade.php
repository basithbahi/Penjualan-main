@extends('layouts.app')

@section('title', 'Data Rute')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form action="{{ route('rute.search') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="query"
                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                <a href="{{ route('rute.tambah') }}" class="btn btn-success mb-3"><i
                        class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Rute</a>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Rute</th>
                            <th>Stasiun Keberangkatan</th>
                            <th>Stasiun Tujuan</th>
                            <th>Harga</th>
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
                                <td>{{ $row->stasiun->nama_stasiun }}</td>
                                <td>{{ $row->stasiun_tujuan }}</td>
                                <td>{{ $row->harga }}</td>
                                @if (auth()->user()->level == 'Admin')
                                    <td>
                                        <a href="{{ route('rute.edit', $row->id) }}" class="btn btn-warning">Edit
                                            &nbsp;&nbsp;&nbsp;<i class="fas fa-pen"></i></a>
                                        <a href="{{ route('rute.hapus', $row->id) }}" class="btn btn-danger">Hapus
                                            &nbsp;&nbsp;&nbsp;<i class="fas fa-trash-alt "></i></a>
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

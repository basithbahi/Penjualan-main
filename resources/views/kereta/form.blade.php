@extends('layouts.app')

@section('title', 'Form Kereta')

@section('contents')
  <form action="{{ isset($kereta) ? route('kereta.tambah.update', $kereta->id) : route('kereta.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($kereta) ? 'Form Edit Kereta' : 'Form Tambah Kereta' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="id_kereta">ID Kereta</label>
              <input type="text" class="form-control" id="id_kereta" name="id_kereta" value="{{ isset($kereta) ? $kereta->id_kereta : '' }}">
            </div>
            <div class="form-group">
              <label for="nama_kereta">Nama Kereta</label>
              <input type="text" class="form-control" id="nama_kereta" name="nama_kereta" value="{{ isset($kereta) ? $kereta->nama_kereta : '' }}">
            </div>
            <div class="form-group">
              <label for="jenis_kereta">Jenis Kereta</label>
              <input type="text" class="form-control" id="jenis_kereta" name="jenis_kereta" value="{{ isset($kereta) ? $kereta->jenis_kereta : '' }}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection

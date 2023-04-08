@extends('layouts.app')

@section('title', 'Form Gerbong')

@section('contents')
  <form action="{{ isset($gerbong) ? route('gerbong.tambah.update', $gerbong->id) : route('gerbong.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($gerbong) ? 'Form Edit Gerbong' : 'Form Tambah Gerbong' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="id_gerbong">ID Gerbong</label>
              <input type="text" class="form-control" id="id_gerbong" name="id_gerbong" value="{{ isset($gerbong) ? $gerbong->id_gerbong : '' }}">
            </div>
            <div class="form-group">
              <label for="nama_gerbong">Nama Gerbong</label>
              <input type="text" class="form-control" id="nama_gerbong" name="nama_gerbong" value="{{ isset($gerbong) ? $gerbong->nama_gerbong : '' }}">
            </div>
            <div class="form-group">
              <label for="id_kereta">Gerbong Kereta</label>
							<select name="id_kereta" id="id_kereta" class="custom-select">
								<option value="" selected disabled hidden>-- Pilih Kereta --</option>
								@foreach ($kereta as $row)
									<option value="{{ $row->id }}" {{ isset($gerbong) ? ($gerbong->id_kereta == $row->id ? 'selected' : '') : '' }}>{{ $row->nama_kereta }}</option>
								@endforeach
							</select>
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

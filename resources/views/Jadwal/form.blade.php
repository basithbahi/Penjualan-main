@extends('layouts.app')

@section('title', 'Form Jadwal')

@section('contents')

  <form action="{{ isset($jadwal) ? route('jadwal.tambah.update', $jadwal->id) : route('jadwal.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($jadwal) ? 'Form Edit Gerbong' : 'Form Tambah Jadwal' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="id_jadwal">ID Jadwal</label>
              <input type="text" class="form-control" id="id_jadwal" name="id_jadwal" value="{{ isset($jadwal) ? $jadwal->id_jadwal : '' }}">
            </div>
            <div class="form-group">
              <label for="user_jadwal">Admin </label>
              <input type="text" class="form-control" id="user_jadwal" name="user_jadwal" value="{{ isset($jadwal) ? $jadwal->user_jadwal : '' }}">
            </div>
            <div class="form-group">
              <label for="jadwal_kereta">Jadwal Kereta</label>
							<select name="id_kereta" id="id_kereta" class="custom-select">
								<option value="" selected disabled hidden>-- Pilih Kereta --</option>
								@foreach ($kereta as $row)
									<option value="{{ $row->id }}" {{ isset($jadwal) ? ($jadwal->id_kereta == $row->id ? 'selected' : '') : '' }}>
                    {{ $row->nama_kereta }} - {{ $row->jenis_kereta }}
                  </option>
								@endforeach
							</select>
            </div>
          </div>
          <div class="form-group">
              <label for="rute_jadwal">Jadwal Rute</label>
							<select name="rute_jadwal" id="rute_jadwal" class="custom-select">
							</select>
            </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
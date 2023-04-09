@extends('layouts.app')

@section('title', 'Form Rute')

@section('contents')
  <form action="{{ isset($rute) ? route('rute.tambah.update', $rute->id) : route('rute.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($rute) ? 'Form Edit Rute' : 'Form Tambah Rute' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="id_rute">ID Rute</label>
              <input type="text" class="form-control" id="id_rute" name="id_rute" value="{{ isset($rute) ? $rute->id_rute : '' }}">
            </div>
            <div class="form-group">
              <label for="id_stasiun">Stasiun Keberangkatan</label>
							<select name="id_stasiun" id="id_stasiun" class="custom-select">
								<option value="" selected disabled hidden>-- Pilih Stasiun Keberangkatan --</option>
								@foreach ($stasiun as $row)
									<option value="{{ $row->id }}" {{ isset($rute) ? ($rute->id_stasiun == $row->id ? 'selected' : '') : '' }}>{{ $row->nama_stasiun}}</option>
								@endforeach
							</select>
            </div>
            <div class="form-group">
                <label for="stasiun_tujuan">Stasiun Tujuan</label>
                <input type="text" class="form-control" id="stasiun_tujuan" name="stasiun_tujuan" value="{{ isset($rute) ? $rute->stasiun_tujuan : '' }}">
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

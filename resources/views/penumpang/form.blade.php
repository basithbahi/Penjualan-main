@extends('layouts.cekTransaksi')

@section('contents')

    <form action="{{ isset($penumpang) ? route('penumpang.tambah.update', $penumpang->id) : route('penumpang.tambah.simpan') }}"
        method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Anda dapat menambahkan maksimal 25 penumpang</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ isset($penumpang) ? $penumpang->nik : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ isset($penumpang) ? $penumpang->nama : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div class="form-control form-control-user" style="font-size: 14px;">
                            <input class="form-control-input" type="radio" name="jk" id="inlineRadio1" value="Pria" {{ isset($penumpang) && $penumpang->jk === 'Pria' ? 'checked' : '' }}>
                            <label class="form-control-label" for="inlineRadio1">Pria</label> &nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-control-input" type="radio" name="jk" id="inlineRadio2" value="Wanita" {{ isset($penumpang) && $penumpang->jk === 'Wanita' ? 'checked' : '' }}>
                            <label class="form-control-label" for="inlineRadio2">Wanita</label>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input name="tgl_lahir" type="date" class="form-control form-control-user @error('tgl_lahir')is-invalid @enderror" id="exampleInputtgl_lahir" placeholder="Tanggal Lahir" value="{{ isset($penumpang) ? $penumpang->tgl_lahir : '' }}">
                            @error('tgl_lahir')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="text" class="form-control" id="id_user" name="id_user"
                        value="{{ auth()->user()->id }}" hidden>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

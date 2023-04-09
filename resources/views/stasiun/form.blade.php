@extends('layouts.app')

@section('title', 'Form Stasiun')

@section('contents')
    <form action="{{ isset($stasiun) ? route('stasiun.tambah.update', $stasiun->id) : route('stasiun.tambah.simpan') }}"
        method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($stasiun) ? 'Form Edit Stasiun' : 'Form Tambah Stasiun' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_stasiun">ID Stasiun</label>
                            <input type="text" class="form-control" id="id_stasiun" name="id_stasiun"
                                value="{{ isset($stasiun) ? $stasiun->id_stasiun : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_stasiun">Nama Stasiun</label>
                            <input type="text" class="form-control" id="nama_stasiun" name="nama_stasiun"
                                value="{{ isset($stasiun) ? $stasiun->nama_stasiun : '' }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
    </form>
@endsection

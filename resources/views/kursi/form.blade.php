@extends('layouts.app')

@section('title', 'Form Kursi')

@section('contents')
    <form action="{{ isset($kursi) ? route('kursi.tambah.update', $kursi->id) : route('kursi.tambah.simpan') }}"
        method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($kursi) ? 'Form Edit Kursi' : 'Form Tambah Kursi' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_kursi">ID Kursi</label>
                            <input type="text" class="form-control" id="id_kursi" name="id_kursi"
                                value="{{ isset($kursi) ? $kursi->id_kursi : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nama_kursi">Nama Kursi</label>
                            <input type="text" class="form-control" id="nama_kursi" name="nama_kursi"
                                value="{{ isset($kursi) ? $kursi->nama_kursi : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="id_gerbong">Kursi Gerbong</label>
                            <select name="id_gerbong" id="id_gerbong" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Gerbong --</option>
                                @foreach ($gerbong as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($kursi) ? ($kursi->id_gerbong == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->nama_gerbong }}</option>
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

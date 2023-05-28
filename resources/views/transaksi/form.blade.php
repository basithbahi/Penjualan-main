@extends('layouts.app')

@section('title', 'Form Transaksi')

@section('contents')

    <form
        action="{{ isset($transaksi) ? route('transaksi.tambah.update', $transaksi->id) : route('transaksi.tambah.simpan') }}"
        method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($transaksi) ? 'Form Edit Transaksi' : 'Form Tambah Transaksi' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="invoice">ID Transaksi</label>
                            <input type="text" class="form-control" id="invoice" name="invoice"
                                value="{{ isset($transaksi) ? $transaksi->invoice : '' }}">
                        </div>

                        <div class="form-group">
                            <label for="nik">User</label>
                            <select name="nik" id="nik" class="custom-select">
                                <option value="{{ auth()->user()->id }}">
                                    {{ auth()->user()->nama }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_metode_pembayaran">Metode Pembayaran</label>
                            <select name="id_metode_pembayaran" id="id_metode_pembayaran" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Metode Pembayaran --</option>
                                @foreach ($metode_pembayaran as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($transaksi) ? ($row->id == $transaksi->id ? 'selected' : '') : '' }}>
                                        {{ $row->metode_pembayaran }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_jadwal">Jadwal Kereta</label>
                            <select name="id_jadwal" id="id_jadwal" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Jadwal Kereta --</option>
                                @foreach ($jadwal as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($transaksi) ? ($row->id == $transaksi->id_jadwal ? 'selected' : '') : '' }}>
                                        {{ $row->rute->stasiun->nama_stasiun }} - {{ $row->rute->stasiun_tujuan }}
                                    </option>
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

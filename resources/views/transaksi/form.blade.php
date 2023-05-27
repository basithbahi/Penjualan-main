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
                            <label for="id_user">User</label>
                            <select name="id_user" id="id_user" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih User--</option>
                                @foreach ($user as $row)
                                    @if ($row->level == 'User')
                                        <option value="{{ $row->id }}"
                                            {{ isset($transaksi) ? ($transaksi->id_user == $row->id ? 'selected' : '') : '' }}>
                                            {{ $row->nama }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_metode_pembayaran">Metode Pembayaran</label>
                            <select name="id_metode_pembayaran" id="id_metode_pembayaran" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Metode Pembayaran --</option>
                                @foreach ($id_metode_pembayaran as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($transaksi) ? ($transaksi->id_metode_pembayaran == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->metode_pembayaran }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_jadwal">Jadwal Kereta</label>
                            <select name="id_jadwal" id="id_jadwal" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Jadwal Kereta Api --</option>
                                @foreach ($id_jadwal as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($transaksi) ? ($transaksi->id_jadwal == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->jadwal }}
                                    </option>
                                @endforeach
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

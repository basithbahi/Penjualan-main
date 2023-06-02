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
                            <label for="id_jadwal">Jadwal Kereta</label>
                            <select name="id_jadwal" id="id_jadwal" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Jadwal Kereta --</option>
                                @foreach ($jadwal as $row)
                                    <option value="{{ $row->id }}" data-harga="{{ $row->harga }}"
                                    <option value="{{ $row->id }}" data-harga="{{ $row->harga }}"
                                        {{ isset($transaksi) ? ($row->id == $transaksi->id_jadwal ? 'selected' : '') : '' }}>
                                        {{ $row->rute->stasiun->nama_stasiun }} - {{ $row->rute->stasiun_tujuan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_kursi">Kursi</label>
                            <select name="id_kursi" id="id_kursi" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Kursi --</option>
                                @foreach ($kursi as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($transaksi) ? ($row->id == $transaksi->id_kursi ? 'selected' : '') : '' }}>
                                        {{ $row->nama_kursi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_metode_pembayaran">Metode Pembayaran</label>
                            <select name="id_metode_pembayaran" id="id_metode_pembayaran" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Metode Pembayaran --</option>
                                @foreach ($metode_pembayaran as $row)
                                    @if (is_object($row))
                                        $id = $row->id;
                                        <option value="{{ $row->id }}"
                                        {{ isset($transaksi) ? ($transaksi->id_metode_pembayaran == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->metode_pembayaran }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Total Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga"
                            value="{{ isset($transaksi) ? $transaksi->jadwal->harga : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="total_bayar">Total Bayar</label>
                            <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="{{ isset($transaksi) ? $transaksi->total_bayar : '' }}">
                        </div>

                        <div class="form-group">
                            <label for="id_metode_pembayaran">Metode Pembayaran</label>
                            <select name="id_metode_pembayaran" id="id_metode_pembayaran" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Metode Pembayaran --</option>
                                @foreach ($metode_pembayaran as $row)
                                    @if (is_object($row))
                                        $id = $row->id;
                                        <option value="{{ $row->id }}"
                                        {{ isset($transaksi) ? ($transaksi->id_metode_pembayaran == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->metode_pembayaran }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Total Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga"
                            value="{{ isset($transaksi) ? $transaksi->jadwal->harga : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="total_bayar">Total Bayar</label>
                            <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="{{ isset($transaksi) ? $transaksi->total_bayar : '' }}">
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="btn-simpan" id="btn-simpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var jadwalSelect = document.getElementById('id_jadwal');
            var hargaInput = document.getElementById('harga');
            var totalBayarInput = document.getElementById('total_bayar');
            var btnSimpan = document.getElementById('btn-simpan');

            jadwalSelect.addEventListener('change', function() {
                var selectedOption = jadwalSelect.options[jadwalSelect.selectedIndex];
                var harga = selectedOption.getAttribute('data-harga');

                if (harga) {
                    hargaInput.value = harga;
                } else {
                    hargaInput.value = '';
                }
            });

            totalBayarInput.addEventListener('input', function() {
                var totalBayar = parseFloat(totalBayarInput.value);
                var harga = parseFloat(hargaInput.value);

                if (totalBayar < harga || totalBayar > harga) {
                    btnSimpan.disabled = true;
                } else {
                    btnSimpan.disabled = false;
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var jadwalSelect = document.getElementById('id_jadwal');
            var hargaInput = document.getElementById('harga');
            var totalBayarInput = document.getElementById('total_bayar');
            var btnSimpan = document.getElementById('btn-simpan');

            jadwalSelect.addEventListener('change', function() {
                var selectedOption = jadwalSelect.options[jadwalSelect.selectedIndex];
                var harga = selectedOption.getAttribute('data-harga');

                if (harga) {
                    hargaInput.value = harga;
                } else {
                    hargaInput.value = '';
                }
            });

            totalBayarInput.addEventListener('input', function() {
                var totalBayar = parseFloat(totalBayarInput.value);
                var harga = parseFloat(hargaInput.value);

                if (totalBayar < harga || totalBayar > harga) {
                    btnSimpan.disabled = true;
                } else {
                    btnSimpan.disabled = false;
                }
            });
        });
    </script>
@endsection
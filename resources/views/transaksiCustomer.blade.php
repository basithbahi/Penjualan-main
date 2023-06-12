@extends('layouts.customer')

@section('title', 'Form Transaksi')

@section('contents')

    <form action="{{ route('transaksi.tambahCustomer.simpanCustomer') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($transaksi) ? 'Form Edit Transaksi' : 'Form Tambah Transaksi' }}</h6>
                    </div>
                    <div class="card-body">
                        @php
                            $idJadwal = $jadwal->id;
                            $idTransaksi = 'TR' . str_pad($idJadwal, 2, '0', STR_PAD_LEFT);
                        @endphp

                        <div class="form-group">
                            <label for="invoice">ID Transaksi</label>
                            <input type="text" class="form-control" id="invoice" name="invoice"
                                value="{{ isset($transaksi) ? $transaksi->invoice : $idTransaksi }}" readonly>
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
                            <input type="hidden" name="id_jadwal" value="{{ $jadwal->id }}">
                            <input type="text" class="form-control" id="id_jadwal" value="{{ $jadwal->kereta->nama_kereta }} - {{ $jadwal->kereta->jenis_kereta }} | {{ $jadwal->rute->stasiun->nama_stasiun }} - {{ $jadwal->rute->stasiun_tujuan }}" readonly>
                            <small class="text-success">Berhasil Dipesan!</small>
                        </div>

                        <div class="form-group">
                            <label for="id_kursi">Kursi</label>
                            <div>
                                @foreach ($kursi as $row)
                                    <button type="button" class="btn btn-outline-primary kursi"
                                        data-id-kursi="{{ $row->id }}">{{ $row->nama_kursi }}</button>
                                @endforeach
                            </div>
                        </div>
                        <input type="hidden" id="id_kursi" name="id_kursi">

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
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga"
                                value="{{ $harga }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="total_bayar">Total Bayar</label>
                            <input type="text" class="form-control" id="total_bayar" name="total_bayar"
                                value="{{ isset($transaksi) ? $transaksi->total_bayar : '' }}">
                        </div>

                    </div>
                    <td>
                    <div class="card-footer">
                        <button href="{{ route('transaksi.searchIndex') }}" type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
                    </div>
                    </td>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var kursiButtons = document.querySelectorAll('.kursi');
            var idKursiInput = document.getElementById('id_kursi');

            kursiButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var idKursi = this.getAttribute('data-id-kursi');
                    idKursiInput.value = idKursi;
                    kursiButtons.forEach(function(btn) {
                        btn.classList.remove('btn-primary');
                    });
                    this.classList.add('btn-primary');
                });
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

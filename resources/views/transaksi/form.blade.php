@extends('layouts.customer')

@section('title', 'Form Transaksi')

@section('contents')

<form action="{{ isset($transaksi) ? route('transaksi.tambah.update', $transaksi->id) : route('transaksi.tambah.simpan') }}" method="post">
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
                            $nomorVirtualAccount = generateVirtualAccount();

                            function generateVirtualAccount()
                            {
                                $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $length = 12;
                                $randomString = '';

                                for ($i = 0; $i < $length; $i++) {
                                    $randomString .= $characters[rand(0, strlen($characters) - 1)];
                                }

                                return $randomString;
                            }
                        @endphp

                        <div class="form-group">
                            <label for="invoice">ID Transaksi</label>
                            <input type="text" class="form-control" id="invoice" name="invoice"
                                value="{{ isset($transaksi) ? $transaksi->invoice : $idTransaksi }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nik">User</label>
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ auth()->user()->id }}" hidden>
                            <input type="text" class="form-control" id="id_jadwal" value="{{ auth()->user()->nama }}"
                                readonly>
                        </div>

                        <div class="form-group">
                            <label for="id_jadwal">Jadwal Kereta</label>
                            <input type="hidden" name="id_jadwal" value="{{ $jadwal->id }}">
                            <input type="text" class="form-control" id="id_jadwal"
                                value="{{ $jadwal->kereta->nama_kereta }} - {{ $jadwal->kereta->jenis_kereta }} | {{ $jadwal->rute->stasiun->nama_stasiun }} - {{ $jadwal->rute->stasiun_tujuan }}"
                                readonly>
                            <small class="text-success">Berhasil Dipesan!</small>
                        </div>

                        <div class="form-group">
                            <label for="id_gerbong">Gerbong</label>
                            <select name="id_gerbong" id="id_gerbong" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Gerbong --</option>
                                @foreach ($gerbong as $row)
                                    @if ($row->id_kereta == $jadwal->kereta->id)
                                        // Menambahkan kondisi untuk hanya menampilkan gerbong yang terkait dengan kereta
                                        yang dipilih
                                        <option value="{{ $row->id }}">{{ $row->nama_gerbong }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" id="kursi-container" style="display: none;">
                            <label for="id_kursi">Kursi</label><br>
                            <div id="kursi-buttons" class="btn-group"></div>
                        </div>

                        <input type="hidden" name="id_kursi" id="id_kursi">

                        <div class="form-group">
                            <label for="total_bayar">Total Bayar</label>
                            <input type="text" class="form-control" id="total_bayar" name="total_bayar"
                                value="{{ $harga }}" readonly>
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

                        <div id="petunjuk-pembayaran" style="display: none;">
                            <p><strong>Petunjuk Pembayaran</strong></p>
                            <ol>
                                <li>Pilih <b>Transfer > Virtual Account Billing</b></li>
                                <li>Pilih <b>Rekening Debet</b> > Masukkan <b>Nomor Virtual Account
                                        {{ $nomorVirtualAccount }}</b> Pada Menu Input Baru</li>
                                <li><b>Tagihan</b> Yang Harus <b>Dibayar</b> Akan Tampil Pada Layar Konfirmasi</li>
                                <li>Periksa Informasi Yang Tertera Dilayar. Pastikan Merchant Adalah <b>Jejespor</b>,
                                    Total Tagihan Sudah Benar Dan Username Kamu <b>
                                        {{ auth()->user()->nama }}. </b></li>
                                <li>Jika Benar, Masukkan <b>Password Transaksi</b> Dan Pilih Lanjut</li>
                            </ol>
                        </div>

                        <div class="form-group">
                            <label for="bukti_pembayaran"><strong>Bukti Pembayaran</strong></label>
                            @if (isset($transaksi) && $transaksi->bukti_pembayaran)
                                <img src="{{ asset('storage/' . $transaksi->bukti_pembayaran) }}" alt="Bukti Pembayaran"
                                    width="20">
                            @endif
                            <input type="file" class="form-control-file" id="bukti_pembayaran" name="bukti_pembayaran">
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


    <style>
        .btn-group button {
            margin-right: 5px;
            margin-bottom: 5px;
            border-radius: 5px;
            padding: 5px 10px;
            font-size: 14px;
            background-color: #f8f9fa;
            color: #333;
            border: 1px solid #ccc;
        }

        .btn-group button:hover {
            background-color: #e9ecef;
        }
    </style>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var gerbongSelect = document.getElementById('id_gerbong');
            var kursiContainer = document.getElementById('kursi-container');
            var kursiButtons = document.getElementById('kursi-buttons');
            var kursiOptions = {!! $kursi !!};
            var selectedKursi = null;

            gerbongSelect.addEventListener('change', function() {
                var selectedGerbong = gerbongSelect.value;
                kursiButtons.innerHTML = '';

                kursiOptions.forEach(function(kursi) {
                    if (kursi.id_gerbong == selectedGerbong) {
                        var button = document.createElement('button');
                        button.setAttribute('type', 'button');
                        button.setAttribute('data-idkursi', kursi.id);
                        button.innerText = kursi.nama_kursi;
                        button.classList.add('btn', 'btn-primary');
                        button.addEventListener('click', function() {
                            if (selectedKursi !== null) {
                                // Remove 'active' class from the previously selected seat button
                                selectedKursi.classList.remove('active');
                            }
                            // Select the clicked seat
                            selectedKursi = button;
                            selectedKursi.classList.add('active');
                            var idKursiInput = document.getElementById('id_kursi');
                            idKursiInput.value = button.getAttribute('data-idkursi');
                        });
                        kursiButtons.appendChild(button);
                    }
                });

                if (kursiButtons.children.length > 0) {
                    kursiContainer.style.display = 'block';
                } else {
                    kursiContainer.style.display = 'none';
                }
            });

            var metodePembayaranSelect = document.getElementById('id_metode_pembayaran');
            var petunjukPembayaran = document.getElementById('petunjuk-pembayaran');

            metodePembayaranSelect.addEventListener('change', function() {
                var selectedMetodePembayaran = metodePembayaranSelect.value;

                if (selectedMetodePembayaran !== "") {
                    petunjukPembayaran.style.display = 'block';
                } else {
                    petunjukPembayaran.style.display = 'none';
                }
            });
        });
    </script>
@endsection

@extends('layouts.cekTransaksi')

@section('title', 'Form Transaksi')

@section('contents')

    <form action="{{ route('transaksi.tambahCustomer.simpanCustomer') }}" method="post" enctype="multipart/form-data">
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
                            $invoice = 'TR' . mt_rand(1000, 9999);
                            $existing_ids = \App\Models\Transaksi::pluck('invoice')->toArray();
                            while (in_array($invoice, $existing_ids)) {
                                $id_transaksi = 'TR' . mt_rand(1000, 9999);
                            }

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
                                value="{{ isset($transaksi) ? $transaksi->invoice : $invoice }}" readonly>
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

                        <input type="text" class="form-control" id="status_bayar" name="status_bayar"
                            value="BELUM LUNAS" hidden>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <style>
        .btn-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 10px;
        }

        .btn-group button {
            padding: 5px 10px;
            font-size: 10px;
            border: 1px solid #ccc;
            background-color: #f8f9fa;
            color: #333;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-group button[disabled] {
            background-color: #e9ecef;
            color: #6c757d;
            cursor: not-allowed;
        }

        .btn-group button.active {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
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
                    var kursiOptions = JSON.parse('{!! str_replace("'", "\'", $kursi) !!}');
                    var selectedKursi = null;

                    gerbongSelect.addEventListener('change', function() {
                        var selectedGerbong = gerbongSelect.value;
                        kursiButtons.innerHTML = '';

                        var cols = {};

                        kursiOptions.forEach(function(kursi) {
                            if (kursi.id_gerbong == selectedGerbong) {
                                var col = kursi.nama_kursi.charAt(0);

                                if (!cols[col]) {
                                    cols[col] = [];
                                }

                                cols[col].push(kursi);
                            }
                        });

                        var colNumbers = Object.keys(cols).sort();

                        colNumbers.forEach(function(col, index) {
                            var seatsInCol = cols[col];

                            var colContainer = document.createElement('div');
                            colContainer.classList.add('col-md-1', 'mb-1');

                            if (index % 2 === 0) {
                                colContainer.classList.add('mr-md-1');
                            } else if (index === 2) {
                                colContainer.classList.add('mr-md-2');
                            } else {
                                colContainer.classList.add('ml-md-1');
                            }

                            var colHeader = document.createElement('div');

                            colContainer.appendChild(colHeader);

                            seatsInCol.forEach(function(kursi) {
                                var button = document.createElement('button');
                                button.setAttribute('type', 'button');
                                button.setAttribute('data-idkursi', kursi.id);
                                button.innerText = kursi.nama_kursi;
                                button.classList.add('btn', 'btn-primary', 'w-75', 'mb-2');

                                if (kursi.status_kursi === "Ditempati") {
                                    button.disabled = true;
                                } else {
                                    button.addEventListener('click', function() {
                                        if (selectedKursi !== null) {
                                            selectedKursi.classList.remove('active');
                                        }
                                        selectedKursi = button;
                                        selectedKursi.classList.add('active');
                                        var idKursiInput = document.getElementById(
                                            'id_kursi');
                                        idKursiInput.value = button.getAttribute(
                                            'data-idkursi');
                                    });
                                }

                                colContainer.appendChild(button);
                            });

                            kursiButtons.appendChild(colContainer);
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
                        if (metodePembayaranSelect.value !== '') {
                            petunjukPembayaran.style.display = 'block';
                        } else {
                            petunjukPembayaran.style.display = 'none';
                        }
                    });
                });
    </script>


@endsection

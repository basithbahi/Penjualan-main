@extends('layouts.customer')

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
                        <select name="nik" id="nik" class="custom-select">
                            <option value="{{ auth()->user()->id }}">
                                {{ auth()->user()->nama }}
                            </option>
                        </select>
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
                        <select name="id_metode_pembayaran" class="form-control" id="id_metode_pembayaran">
                            <option value="0">Pilih Metode Pembayaran</option>
                            <option value="1">BNI</option>
                            <option value="2">BRI</option>
                            <option value="3">Convenience Store</option>
                            <option value="4">OVO</option>
                            <option value="5">LinkAja</option>
                        </select>
                    </div>

                    <div id="bniPetunjuk" style="display: none;">
                        <h4>Petunjuk Pembayaran Via BNI</h4>
                        <ol>
                            <li>Pilih <b>Transfer > Virtual Account Billing</b></li>
                            <li>Pilih <b>Rekening Debet</b> > Masukkan <b>Nomor Virtual Account nomor virtual account(yang sudah dirandom diatas)</b> Pada Menu Input Baru</li>
                            <li>Tagihan Yang Harus DIbayar Akan Tampil Pada Layar Konfirmasi</li>
                            <li>Periksa Informasi Yang Tertera Dilayar. Pastikan Merchant Adalah Jejespor, Total Tagihan Sudah Benar Dan Username Kamu (menampilkan nama user  {{ auth()->user()->nama }}). Jika Benar, Masukkan Password Transaksi Dan Pilih Lanjut</li>
                        </ol>
                    </div>

                    @if ($nomorVirtualAccount && $nomorVirtualAccount != '')
                    <div class="form-group" id="virtualAccountContainer" style="display: none;">
                        <label for="nomor_virtual_account">Nomor Virtual Account</label>
                        <input type="text" class="form-control" id="nomor_virtual_account" name="nomor_virtual_account"
                            value="{{ $nomorVirtualAccount }}" readonly>
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="bukti_pembayaran">Bukti Pembayaran</label>
                        @if (isset($transaksi) && $transaksi->bukti_pembayaran)
                        <img src="{{ asset('storage/' . $transaksi->bukti_pembayaran) }}" alt="Bukti Pembayaran"
                            width="20">
                        @endif
                        <input type="file" class="form-control-file" id="bukti_pembayaran" name="bukti_pembayaran">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        {{ isset($transaksi) ? 'Simpan Perubahan' : 'Tambah Transaksi' }}</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.getElementById('id_metode_pembayaran').addEventListener('change', function() {
        var selectedValue = this.value;
        var virtualAccountContainer = document.getElementById('virtualAccountContainer');
        var bniPetunjuk = document.getElementById('bniPetunjuk');

        if (selectedValue === '1') {
            virtualAccountContainer.style.display = 'block';
            bniPetunjuk.style.display = 'block';
        } else {
            virtualAccountContainer.style.display = 'none';
            bniPetunjuk.style.display = 'none';
        }
    });
</script>

@endsection

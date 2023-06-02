<!-- @extends('layouts.app')

@section('title', 'Form Bayar')

@section('contents')

    <form
    action="{{ $transaksi && isset($transaksi->id) ? route('transaksi.bayar.upload', $transaksi->id) : route('transaksi.bayar.upload') }}"
    method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                            {{ $transaksi && isset($transaksi->id) ? 'Form Edit Transaksi' : 'Form Tambah Transaksi' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_riwayat_transaksi">ID Riwayat Transaksi</label>
                            <input type="text" class="form-control" id="id_riwayat_transaksi"
                                name="id_riwayat_transaksi">
                        </div>
                        <div class="form-group">
                            <label for="id_transaksi">ID Transaksi</label>
                            <input type="text" class="form-control" id="id_transaksi" name="id_transaksi"
                            value="{{ $transaksi->invoice}}">
                        </div>
                        <div class="form-group">
                            <label for="id_metode_pembayaran">Metode Pembayaran</label>
                            <select name="id_metode_pembayaran" id="id_metode_pembayaran" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Metode Pembayaran --</option>
                                @foreach ($metode_pembayaran as $row)
                                    @if (is_object($row))
                                        $id = $row->id;
                                        <option value="{{ $row->id }}"
                                        {{ isset($riwayat_transaksi) ? ($riwayat_transaksi->id_metode_pembayaran == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->metode_pembayaran }}</option>
                                    @endif
                                @endforeach
                            </select>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Total Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga"
                            value="{{ $transaksi->jadwal->harga }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"
                            onclick="">
                            Bayar
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection -->

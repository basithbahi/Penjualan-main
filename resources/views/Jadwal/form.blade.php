@extends('layouts.app')

@section('title', 'Form Jadwal')

@section('contents')

    <form action="{{ isset($jadwal) ? route('jadwal.tambah.update', $jadwal->id) : route('jadwal.tambah.simpan') }}"
        method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($jadwal) ? 'Form Edit Gerbong' : 'Form Tambah Jadwal' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_jadwal">ID Jadwal</label>
                            <input type="text" class="form-control" id="id_jadwal" name="id_jadwal"
                                value="{{ isset($jadwal) ? $jadwal->id_jadwal : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="user_jadwal">Admin</label>
                            <select name="nik" id="nik" class="custom-select">
                                <option value="{{ auth()->user()->id }}">
                                    {{ auth()->user()->nama }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jadwal_kereta">Jadwal Kereta</label>
                            <select name="id_kereta" id="id_kereta" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Kereta --</option>
                                @foreach ($kereta as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($jadwal) ? ($jadwal->id_kereta == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->nama_kereta }} - {{ $row->jenis_kereta }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rute_jadwal">Rute</label>
                            <select name="id_rute" id="id_rute" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Rute --</option>
                                @foreach ($rute as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($jadwal) ? ($jadwal->id_rute == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->stasiun->nama_stasiun }} - {{ $row->stasiun_tujuan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga"
                                value="{{ isset($jadwal) ? $jadwal->harga : '' }}">
                        </div>
                        <div class="form-group">
                                <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                                <input name="tanggal_keberangkatan" type="date"
                                    class="form-control form-control-user @error('tanggal_keberangkatan')is-invalid @enderror"
                                    id="exampleInputDate" placeholder="Tanggal Keberangkatan"
                                    value="{{ isset($user) ? $user->tanggal_keberangkatan : '' }}">
                                @error('tanggal_keberangkatan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        <div class="form-group">
                            <label for="waktu_keberangkatan">Waktu Keberangkatan</label>
                            <input name="waktu_keberangkatan" type="text" class="form-control datetimepicker-input" id="waktu_keberangkatan"
                                data-toggle="datetimepicker" data-target="#waktu_keberangkatan" placeholder="Waktu"
                                value="{{ isset($jadwal) ? $jadwal->waktu_keberangkatan : '' }}">
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

@push('scripts')
    <script>
        $(function() {
            $('.datetimepicker-input').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                // Anda dapat menyesuaikan format dan opsi sesuai kebutuhan Anda
            });
        });
    </script>
@endpush
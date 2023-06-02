<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Kursi;
use App\Models\MetodePembayaran;
use App\Models\MetodePembayaran;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::get();

        return view('transaksi.index', ['data' => $transaksi]);
    }

    public function tambah()
    {
        $user = User::get();
        $jadwal = Jadwal::get();
        $kursi = Kursi::get();
        $kursi = Kursi::get();
        $metode_pembayaran = MetodePembayaran::get();

        return view('transaksi.form', ['user' => $user, 'jadwal' => $jadwal, 'kursi' => $kursi, 'metode_pembayaran' => $metode_pembayaran]);
        return view('transaksi.form', ['user' => $user, 'jadwal' => $jadwal, 'kursi' => $kursi, 'metode_pembayaran' => $metode_pembayaran]);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'total_bayar' => 'required|numeric|min:0'
        ]);

        $request->validate([
            'nik' => 'required',
            'total_bayar' => 'required|numeric|min:0'
        ]);

        $data = [
            'invoice' => $request->invoice,
            'nik' => $request->nik,
            'id_jadwal' => $request->id_jadwal,
            'id_kursi' => $request->id_kursi,
            'id_kursi' => $request->id_kursi,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'total_bayar' =>$request->total_bayar,
        ];

        Transaksi::create($data);

        return redirect()->route('transaksi');
    }

    // public function bayar($id)
    // {
    //     $transaksi = Transaksi::find($id);

    //     return view('transaksi.bayar', ['transaksi' => $transaksi,]);
    // }

    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'nik' => 'required'
    //     ]);

    //     $data = [
    //         'id_riwayat_transaksi' => $request->id_riwayat_transaksi,
    //         'invoice' => $request->invoice,
    //         'total_harga' => $request->total_harga,
    //     ];

    //     Transaksi::create($data);

    //     return redirect()->route('riwayat_transaksi');
    // }

    // public function bayar($id)
    // {
    //     $transaksi = Transaksi::find($id);

    //     return view('transaksi.bayar', ['transaksi' => $transaksi,]);
    // }

    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'nik' => 'required'
    //     ]);

    //     $data = [
    //         'id_riwayat_transaksi' => $request->id_riwayat_transaksi,
    //         'invoice' => $request->invoice,
    //         'total_harga' => $request->total_harga,
    //     ];

    //     Transaksi::create($data);

    //     return redirect()->route('riwayat_transaksi');
    // }

    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $user = User::get();
        $jadwal = Jadwal::get();
        $kursi = Kursi::get();
        $kursi = Kursi::get();
        $metode_pembayaran = MetodePembayaran::get();

        return view('transaksi.form', ['transaksi' => $transaksi, 'user' => $user, 'jadwal' => $jadwal, 'kursi' => $kursi, 'metode_pembayaran' => $metode_pembayaran]);
        return view('transaksi.form', ['transaksi' => $transaksi, 'user' => $user, 'jadwal' => $jadwal, 'kursi' => $kursi, 'metode_pembayaran' => $metode_pembayaran]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'invoice' => $request->invoice,
            'nik' => $request->nik,
            'id_jadwal' => $request->id_jadwal,
            'id_kursi' => $request->id_kursi,
            'id_kursi' => $request->id_kursi,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'total_bayar' =>$request->total_bayar,
        ];

        Transaksi::find($id)->update($data);

        return redirect()->route('transaksi');
    }

    public function hapus($id)
    {
        Transaksi::find($id)->delete();

        return redirect()->route('transaksi');
    }

    // public function bayar($id)
    // {
    //     $transaksi = Transaksi::find($id);
    //     $metode_pembayaran = MetodePembayaran::find($id);

    //     return view('transaksi.bayar', ['transaksi' => $transaksi, 'metode_pembayaran' => $metode_pembayaran]);
    // }

    // public function upload(Request $request)
    // {
    //     $data = [
    //         'invoice' => $request->invoice,
    //         'metode_pembayaran' => $request->metode_pembayaran,
    //         'total_bayar' => $request->total_bayar,
    //     ];

    //     // RiwayatTransaksi::create($data);

    //     return redirect()->route('riwayat_transaksi');
    // }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $data = Transaksi::with('user', 'id_jadwal')
            $data = Transaksi::with('user', 'id_jadwal')
                ->where('invoice', 'like', "%$query%")
                ->orderBy('invoice', 'asc')
                ->paginate(10);
        } else {
            $data = Transaksi::with('user', 'id_jadwal')->get();
            $data = Transaksi::with('user', 'id_jadwal')->get();
        }

        return view('transaksi.index', ['data' => $data, 'query' => $query]);
    }

    public function searchKodeBooking(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $data = Transaksi::query()
                ->where('invoice', 'like', "%$query%")
                ->orderBy('invoice', 'asc');
        } else {
            $data = Transaksi::get();
        }

        return view('cekKodeBooking', ['data' => $data, 'query' => $query]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodePembayaran;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Kursi;

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
        $metode_pembayaran = MetodePembayaran::get();
        $kursi = Kursi::get();

        return view('transaksi.form', ['user' => $user, 'jadwal' => $jadwal, 'metode_pembayaran' => $metode_pembayaran, 'kursi' => $kursi]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'invoice' => $request->invoice,
            'nik' => $request->nik,
            'id_jadwal' => $request->id_jadwal,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'id_kursi' => $request->id_kursi,
        ];

        Transaksi::create($data);

        return redirect()->route('transaksi');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $user = User::get();
        $jadwal = Jadwal::get();
        $metode_pembayaran = MetodePembayaran::get();
        $kursi = Kursi::get();

        return view('transaksi.form', ['transaksi' => $transaksi, 'user' => $user, 'jadwal' => $jadwal, 'metode_pembayaran' => $metode_pembayaran, 'kursi' => $kursi]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'invoice' => $request->invoice,
            'nik' => $request->nik,
            'id_jadwal' => $request->id_jadwal,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'id_kursi' => $request->id_kursi,
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
            $data = Transaksi::with('user', 'id_jadwal', 'id_metode_pembayaran')
                ->where('invoice', 'like', "%$query%")
                ->orWhere('nama_user', 'like', "%$query%")
                ->orderBy('invoice', 'asc')
                ->paginate(10);
        } else {
            $data = Transaksi::with('user', 'id_jadwal', 'id_metode_pembayaran')->get();
        }

        return view('transaksi.index', ['data' => $data, 'query' => $query]);
    }
}

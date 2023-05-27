<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Gerbong;
use App\Models\Kereta;
use App\Models\Kursi;
use App\Models\MetodePembayaran;
use App\Models\Rute;
use App\Models\Stasiun;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\RiwayatTransaksi;
use App\Http\Controllers\Exception;
use Exception as GlobalException;
use FFI\Exception as FFIException;

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

        return view('transaksi.form', ['user' => $user, 'jadwal' => $jadwal, 'metode_pembayaran' => $metode_pembayaran,]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'invoice' => $request->invoice,
            'id_user' => $request->id_user,
            'id_jadwal' => $request->id_jadwal,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
        ];

        Transaksi::create($data);

        return redirect()->route('transaksi');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $user = User::get();
        $id_jadwal = Jadwal::get();
        $id_metode_pembayaran = MetodePembayaran::get();

        return view('transaksi.form', ['transaksi' => $transaksi, 'user' => $user, 'id_jadwal' => $id_jadwal, 'id_metode_pembayaran' => $id_metode_pembayaran]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'invoice' => $request->invoice,
            'id_user' => $request->id_user,
            'id_jadwal' => $request->id_jadwal,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
        ];

        Transaksi::find($id)->update($data);

        return redirect()->route('transaksi');
    }

    public function hapus($id)
    {
        Transaksi::find($id)->delete();

        return redirect()->route('transaksi');
    }

    public function bayar($id)
    {
        $transaksi = Transaksi::find($id);
        $metode_pembayaran = MetodePembayaran::find($id);

        return view('transaksi.bayar', ['transaksi' => $transaksi, 'metode_pembayaran' => $metode_pembayaran]);
    }

    public function upload(Request $request)
    {
        $data = [
            'id_riwayat_transaksi' => $request->id_riwayat_transaksi,
            'invoice' => $request->invoice,
            'metode_pembayaran' => $request->metode_pembayaran,
            'total_bayar' => $request->total_bayar,
        ];

        RiwayatTransaksi::create($data);

        return redirect()->route('riwayat_transaksi');
    }

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

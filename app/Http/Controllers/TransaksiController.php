<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Gerbong;
use App\Models\Kursi;
use App\Models\Kereta;
use App\Models\Rute;
use App\Models\MetodePembayaran;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::get();

        return view('transaksi.index', ['data' => $transaksi]);
    }


    public function cekKodeBooking()
    {
        $transaksi = Transaksi::get();

        return view('cekKodeBooking', ['data' => $transaksi]);
    }

    public function tambah()
    {
        $user = User::get();
        $jadwal = Jadwal::get();
        $gerbong = Gerbong::get();
        $kursi = Kursi::get();
        $metode_pembayaran = MetodePembayaran::get();

        return view('transaksi.form', ['user' => $user, 'jadwal' => $jadwal, 'gerbong' => $gerbong, 'kursi' => $kursi, 'metode_pembayaran' => $metode_pembayaran]);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'total_bayar' => 'required|numeric|min:0'
        ]);

        $image_name = '';
        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images', 'public');
        }

        $data = [
            'invoice' => $request->invoice,
            'nik' => $request->nik,
            'id_jadwal' => $request->id_jadwal,
            'id_gerbong' => $request->id_gerbong,
            'id_kursi' => $request->id_kursi,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'total_bayar' => $request->total_bayar,
            'bukti_pembayaran' => $image_name,
        ];

        Transaksi::create($data);

        return redirect()->route('transaksi');
    }

    public function tambahCustomer(Request $request)
    {
        $id_jadwal = $request->id;
        $harga = $request->harga;

        $user = User::get();
        $jadwal = Jadwal::find($id_jadwal);
        $gerbong = Gerbong::get();
        $kursi = Kursi::get();
        $metode_pembayaran = MetodePembayaran::get();

        return view('transaksiCustomer', ['user' => $user, 'jadwal' => $jadwal, 'gerbong' => $gerbong, 'kursi' => $kursi, 'metode_pembayaran' => $metode_pembayaran, 'harga' => $harga]);
    }

    public function simpanCustomer(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'total_bayar' => 'required|numeric|min:0'
        ]);

        $image_name = '';
        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images', 'public');
        }

        $data = [
            'invoice' => $request->invoice,
            'nik' => $request->nik,
            'id_jadwal' => $request->id_jadwal,
            'id_kursi' => $request->id_kursi,
            'id_gerbong' => $request->id_gerbong,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'total_bayar' => $request->total_bayar,
            'bukti_pembayaran' => $image_name,
        ];

        Transaksi::create($data);
        $user = User::find($request->nik);
        return redirect()->route('transaksi.searchIndex')->with('user', $user);

        // return redirect()->route('home');
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

    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $user = User::get();
        $jadwal = Jadwal::get();
        $gerbong = Gerbong::get();
        $kursi = Kursi::get();
        $metode_pembayaran = MetodePembayaran::get();

        return view('transaksi.form', ['transaksi' => $transaksi, 'user' => $user, 'jadwal' => $jadwal, 'gerbong' => $gerbong, 'kursi' => $kursi, 'metode_pembayaran' => $metode_pembayaran]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'invoice' => $request->invoice,
            'nik' => $request->nik,
            'id_jadwal' => $request->id_jadwal,
            'id_gerbong' => $request->id_gerbong,
            'id_kursi' => $request->id_kursi,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'total_bayar' => $request->total_bayar,
            'bukti_pembayaran' => $request->bukti_pembayaran,
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
                ->where('invoice', 'like', "%$query%")
                ->orderBy('invoice', 'asc')
                ->paginate(10);
        } else {
            $data = Transaksi::with('user', 'id_jadwal')->get();
        }

        return view('transaksi.index', ['data' => $data, 'query' => $query]);
    }

    public function searchKodeBooking()
    {
        $query = request()->input('query');

        if ($query) {
            $data = Transaksi::query()
                ->where('invoice', 'like', "%$query%")
                ->orderBy('invoice', 'asc')
                ->get();
        } else {
            $data = null;
        }

        return view('cekKodeBooking', ['data' => $data, 'query' => $query]);
    }

    public function lunas($id)
    {
        $data = [
            'status_bayar' => 'LUNAS',
        ];

        Transaksi::find($id)->update($data);

        return redirect()->route('transaksi');
    }

    public function searchIndex(Request $request)
    {
        $query = $request->input('stasiun');
        $query2 = $request->input('tanggal');
        $query3 = $request->input('nik');

        if ($query) {
            $data = Transaksi::query()
                ->join('rute', 'jadwal.id_rute', '=', 'rute.id_rute')
                ->where('rute.id_stasiun', 'like', "%$query%")
                ->Where('jadwal.tanggal', 'like', "%$query2%")
                ->Where('user.nik', 'like', "%$query3%")
                ->orderBy('jadwal.id_kereta', 'asc')
                ->paginate(10);
        } else {
            $data = Transaksi::get();
        }

        return view('cekTiket', ['data' => $data, 'query' => $query]);
    }
}

<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Kursi;
use App\Models\MetodePembayaran;

class RiwayatTransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::get();

        return view('riwayat_transaksi.index', ['data' => $transaksi]);
    }

    public function cekKodeBooking()
    {
        $transaksi = Transaksi::get();

        return view('cekKodeBooking', ['data' => $transaksi]);
    }

    public function cekTransaksi()
    {
        $transaksi = Transaksi::get();

        return view('cekTransaksi', ['data' => $transaksi]);
    }

    public function cetak()
    {
        $transaksi = Transaksi::where('status_bayar', 'Lunas')->findOrFail($$id_transaksi);
        $pdf = PDF::loadView('transaksi.cetak', ['transaksi' => $transaksi]);
        return $pdf->stream();
    }


    public function tambah()
    {
        $user = User::get();
        $jadwal = Jadwal::get();
        $kursi = Kursi::get();
        $metode_pembayaran = MetodePembayaran::get();

        return view('riwayat_transaksi.form', ['user' => $user, 'jadwal' => $jadwal, 'kursi' => $kursi, 'metode_pembayaran' => $metode_pembayaran]);
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
            'id_kursi' => $request->id_kursi,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
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
        $kursi = Kursi::get();
        $metode_pembayaran = MetodePembayaran::get();

        return view('transaksiCustomer', ['user' => $user, 'jadwal' => $jadwal, 'kursi' => $kursi, 'metode_pembayaran' => $metode_pembayaran, 'harga' => $harga]);
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
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'bukti_pembayaran' => $image_name,
        ];

        Transaksi::create($data);

        return redirect()->route('home');
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
        $kursi = Kursi::get();
        $metode_pembayaran = MetodePembayaran::get();

        return view('riwayat_transaksi.form', ['transaksi' => $transaksi, 'user' => $user, 'jadwal' => $jadwal, 'kursi' => $kursi, 'metode_pembayaran' => $metode_pembayaran]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'invoice' => $request->invoice,
            'nik' => $request->nik,
            'id_jadwal' => $request->id_jadwal,
            'id_kursi' => $request->id_kursi,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'total_bayar' => $request->total_bayar,
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

        return view('riwayat_transaksi.index', ['data' => $data, 'query' => $query]);
    }
}

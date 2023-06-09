<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Gerbong;
use App\Models\Kursi;
use App\Models\Kereta;
use App\Models\Penumpang;
use App\Models\MetodePembayaran;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::get();

        return view('transaksi.index', ['data' => $transaksi]);
    }

    public function cekTransaksi()
    {
        $transaksi = Transaksi::get();

        return view('cekTransaksi', ['data' => $transaksi]);
    }

    public function cetakTiket($invoice)
    {
        $transaksi = Transaksi::where('invoice', $invoice)->get();
        $pdf = PDF::loadview('transaksi.cetakTiket', compact('transaksi'));
        return $pdf->stream();
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
        $kereta = Kereta::get();
        $metode_pembayaran = MetodePembayaran::get();

        return view('transaksi.form', ['user' => $user, 'jadwal' => $jadwal, 'gerbong' => $gerbong, 'kursi' => $kursi, 'metode_pembayaran' => $metode_pembayaran, 'kereta' => $kereta]);
    }

    public function simpan(Request $request)
    {
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

        if ($request->has('pesan_lagi') && $request->pesan_lagi === 'true') {
            return redirect()
                ->route('transaksi.tambahCustomer')
                ->with('invoice', $request->invoice)
                ->with('nik', $request->nik);
        }

        // return redirect()->route('home');
    }
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

    public function cetak()
    {
        $transaksi = Transaksi::where('status_bayar', 'LUNAS')->get();
        $pdf = PDF::loadView('transaksi.cetak', ['data' => $transaksi]);
        return $pdf->stream();
    }

    public function cetakNota($id_transaksi)
    {
        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->get();
        $pdf = PDF::loadview('transaksi.cetakNota', compact('transaksi'));
        return $pdf->stream();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kereta;
use App\Models\Rute;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::get();

        return view('jadwal.index', ['data' => $jadwal]);
    }

    public function tambah()
    {
        $kereta = Kereta::get();
        $rute = Rute::get();
        $users = User::get();

        return view('jadwal.form', ['kereta' => $kereta, 'rute' => $rute, 'users' => $users]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'id_jadwal' => $request->id_jadwal,
            'nik' => $request->nik,
            'id_kereta' => $request->id_kereta,
            'id_rute' => $request->id_rute,
            'harga' => $request->harga,
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
            'waktu_keberangkatan' => $request->waktu_keberangkatan,

        ];

        Jadwal::create($data);

        return redirect()->route('jadwal');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        $kereta = Kereta::get();
        $rute = Rute::get();
        $users = User::get();

        return view('jadwal.form', ['jadwal' => $jadwal, 'kereta' => $kereta, 'rute' => $rute, 'users' => $users]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'id_jadwal' => $request->id_jadwal,
            'nik' => $request->nik, // Ganti dengan nama input yang sesuai
            'id_kereta' => $request->id_kereta,
            'id_rute' => $request->id_rute,
            'harga' => $request->harga,
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
            'waktu_keberangkatan' => $request->waktu_keberangkatan,


        ];

        Jadwal::find($id)->update($data);

        return redirect()->route('jadwal');
    }

    public function hapus($id)
    {
        Jadwal::find($id)->delete();

        return redirect()->route('jadwal');
    }



    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $data = Jadwal::query()
                ->where('id_jadwal', 'like', "%$query%")
                ->orderBy('id_jadwal', 'asc')
                ->paginate(10);
        } else {
            $data = Jadwal::get();
        }

        return view('jadwal.index', ['data' => $data, 'query' => $query]);
    }

    public function searchIndex(Request $request)
    {
        $query = $request->input('stasiunKeberangkatan');
        $query2 = $request->input('tanggal');
        $kereta = Kereta::get();
        $rute = Rute::get();
        $users = User::get();

        if ($query) {
            $data = Jadwal::with('stasiun')
            ->join('rute', 'jadwal.id_rute', '=', 'rute.id_rute')
            ->join('stasiun', 'rute.id_stasiun', '=', 'stasiun.id_stasiun')
            ->where('stasiun.nama_stasiun', 'like', "%$query%")
            ->Where('jadwal.tanggal', 'like', "%$query2%")
            ->orderBy('jadwal.id_kereta', 'asc')
            ->paginate(10);
        } else {
            $data = Jadwal::get();
        }

        return view('pilihJadwal', ['data' => $data, 'query' => $query]);
    }
}

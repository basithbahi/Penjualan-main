<?php

namespace App\Http\Controllers;

use App\Models\Kursi;
use App\Models\Gerbong;
use App\Models\Kereta;
use Illuminate\Http\Request;

class KursiController extends Controller
{
    public function index()
    {
        $kursi = Kursi::get();

        return view('kursi.index', ['data' => $kursi]);
    }

    public function tambah()
    {
        $gerbong = Gerbong::get();

        return view('kursi.form', ['gerbong' => $gerbong]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'id_kursi' => $request->id_kursi,
            'nama_kursi' => $request->nama_kursi,
            'id_gerbong' => $request->id_gerbong,
        ];

        Kursi::create($data);

        return redirect()->route('kursi');
    }

    public function edit($id)
    {
        $kursi = Kursi::find($id);
        $gerbong = Gerbong::get();

        return view('kursi.form', ['kursi' => $kursi, 'gerbong' => $gerbong]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'id_kursi' => $request->id_kursi,
            'nama_kursi' => $request->nama_kursi,
            'id_gerbong' => $request->id_gerbong,
        ];

        Kursi::find($id)->update($data);

        return redirect()->route('kursi');
    }

    public function hapus($id)
    {
        Kursi::find($id)->delete();

        return redirect()->route('kursi');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $data = Kursi::with('gerbong')
                ->where('id_kursi', 'like', "%$query%")
                ->orWhere('nama_kursi', 'like', "%$query%")
                ->orderBy('id_kursi', 'asc')
                ->paginate(10);
        } else {
            $data = Kursi::with('gerbong')->get();
        }

        return view('kursi.index', ['data' => $data, 'query' => $query]);
    }
}
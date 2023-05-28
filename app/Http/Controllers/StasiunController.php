<?php

namespace App\Http\Controllers;

use App\Models\Stasiun;
use Illuminate\Http\Request;
use Exception as GlobalException;
use FFI\Exception as FFIException;

class StasiunController extends Controller
{
    public function index()
    {
        $stasiun = Stasiun::get();

        return view('stasiun/index', ['stasiun' => $stasiun]);
    }

    public function tambah()
    {
        return view('stasiun.form');
    }

    public function simpan(Request $request)
    {
        Stasiun::create([
            'id_stasiun' => $request->id_stasiun,
            'nama_stasiun' => $request->nama_stasiun,
        ]);

        return redirect()->route('stasiun');
    }

    public function edit($id)
    {
        $stasiun = Stasiun::find($id);

        return view('stasiun.form', ['stasiun' => $stasiun]);
    }

    public function update($id, Request $request)
    {
        Stasiun::find($id)->update([
            'id_stasiun' => $request->id_stasiun,
            'nama_stasiun' => $request->nama_stasiun,
        ]);

        return redirect()->route('stasiun');
    }

    public function hapus($id)
    {
        try {
            $stasiun = Stasiun::find($id);

            // cek apakah kereta memiliki relasi dengan gerbong
            if ($stasiun->rute()->exists()) {
                throw new GlobalException("Tidak dapat menghapus kereta yang masih memiliki gerbong terkait.");
            }

            $stasiun->delete();

            return redirect()->route('stasiun')->with('success', 'Data stasiun berhasil dihapus');
        } catch (FFIException $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $stasiun = Stasiun::query()
                ->where('id_stasiun', 'like', "%$query%")
                ->orWhere('nama_stasiun', 'like', "%$query%")
                ->orderBy('id_stasiun', 'asc')
                ->paginate(10);
        } else {
            $stasiun = Stasiun::get();
        }

        return view('stasiun.index', ['stasiun' => $stasiun, 'query' => $query]);
    }
}
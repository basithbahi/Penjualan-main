<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Http\Controllers\Exception;
use Exception as GlobalException;
use FFI\Exception as FFIException;
use Illuminate\Http\Request;

class KeretaController extends Controller
{
    public function index()
    {
        $kereta = Kereta::get();

        return view('kereta/index', ['kereta' => $kereta]);
    }

    public function tambah()
    {
        return view('kereta.form');
    }

    public function simpan(Request $request)
    {
        Kereta::create([
            'id_kereta' => $request->id_kereta,
            'nama_kereta' => $request->nama_kereta,
            'jenis_kereta' => $request->jenis_kereta,
        ]);

        return redirect()->route('kereta');
    }

    public function edit($id)
    {
        $kereta = Kereta::find($id);

        return view('kereta.form', ['kereta' => $kereta]);
    }

    public function update($id, Request $request)
    {
        Kereta::find($id)->update([
            'id_kereta' => $request->id_kereta,
            'nama_kereta' => $request->nama_kereta,
            'jenis_kereta' => $request->jenis_kereta,
        ]);

        return redirect()->route('kereta');
    }

    public function hapus($id)
{
    try {
        $kereta = Kereta::find($id);

        // cek jumlah kereta
        $jumlahKereta = Kereta::count();

        // cek apakah kereta memiliki relasi dengan gerbong
        if ($kereta->gerbong()->exists()) {
            throw new GlobalException("Tidak dapat menghapus kereta yang masih memiliki gerbong terkait.");
        }

        // cek apakah jumlah kereta lebih dari satu
        if ($jumlahKereta > 1) {
            $kereta->delete();
            return redirect()->route('kereta')->with('success', 'Data kereta berhasil dihapus');
        } else {
            throw new GlobalException("Tidak dapat menghapus kereta karena hanya terdapat satu kereta.");
        }
    } catch (GlobalException $e) {
        return redirect()->back()->withErrors([$e->getMessage()]);
    }
}


    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $kereta = Kereta::query()
                ->where('id_kereta', 'like', "%$query%")
                ->orWhere('nama_kereta', 'like', "%$query%")
                ->orWhere('jenis_kereta', 'like', "%$query%")
                ->orderBy('id_kereta', 'asc')
                ->paginate(10);
        } else {
            $kereta = Kereta::get();
        }

        return view('kereta.index', ['kereta' => $kereta, 'query' => $query]);
    }
}

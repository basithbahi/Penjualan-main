<?php

namespace App\Http\Controllers;

use App\Models\Gerbong;
use App\Models\Kereta;
use Exception as GlobalException;
use Illuminate\Http\Request;

class GerbongController extends Controller
{
    public function index()
    {
        $gerbong = Gerbong::get();

        return view('gerbong.index', ['data' => $gerbong]);
    }

    public function tambah()
    {
        $kereta = Kereta::get();

        return view('gerbong.form', ['kereta' => $kereta]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'id_gerbong' => $request->id_gerbong,
            'nama_gerbong' => $request->nama_gerbong,
            'id_kereta' => $request->id_kereta,
        ];

        Gerbong::create($data);

        return redirect()->route('gerbong');
    }

    public function edit($id)
    {
        $gerbong = Gerbong::find($id);
        $kereta = Kereta::get();

        return view('gerbong.form', ['gerbong' => $gerbong, 'kereta' => $kereta]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'id_gerbong' => $request->id_gerbong,
            'nama_gerbong' => $request->nama_gerbong,
            'id_kereta' => $request->id_kereta,
        ];

        Gerbong::find($id)->update($data);

        return redirect()->route('gerbong');
    }

    public function hapus($id)
    {
        try {
            $gerbong = Gerbong::find($id);
    
            // cek jumlah gerbong
            $jumlahGerbong = Gerbong::count();
    
            // cek apakah gerbong memiliki relasi dengan kursi
            if ($gerbong->kursi()->exists()) {
                throw new GlobalException("Tidak dapat menghapus gerbong yang masih memiliki kursi terkait.");
            }
    
            // cek apakah jumlah kereta lebih dari satu
            if ($jumlahGerbong > 1) {
                $gerbong->delete();
                return redirect()->route('gerbong')->with('success', 'Data gerbong berhasil dihapus');
            } else {
                throw new GlobalException("Tidak dapat menghapus gerbong karena hanya terdapat satu gerbong.");
            }
        } catch (GlobalException $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $data = Gerbong::with('kereta')
                ->where('id_gerbong', 'like', "%$query%")
                ->orWhere('nama_gerbong', 'like', "%$query%")
                ->orderBy('id_gerbong', 'asc')
                ->paginate(10);
        } else {
            $data = Gerbong::with('kereta')->get();
        }

        return view('gerbong.index', ['data' => $data, 'query' => $query]);
    }
}

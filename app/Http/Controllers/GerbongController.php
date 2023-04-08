<?php

namespace App\Http\Controllers;

use App\Models\Gerbong;
use App\Models\Kereta;
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
        $gerbong = Gerbong::find($id)->first();
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
        Gerbong::find($id)->delete();

        return redirect()->route('gerbong');
    }
}

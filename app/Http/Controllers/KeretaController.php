<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
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
        $kereta = Kereta::find($id)->first();

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
}

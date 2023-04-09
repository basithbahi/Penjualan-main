<?php

namespace App\Http\Controllers;

use App\Models\Stasiun;
use Illuminate\Http\Request;

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
}

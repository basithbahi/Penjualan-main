<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use App\Models\Stasiun;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    public function index()
    {
        $rute = Rute::get();

        return view('rute.index', ['data' => $rute]);
    }

    public function tambah()
    {
        $stasiun = Stasiun::get();

        return view('rute.form', ['stasiun' => $stasiun]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'id_rute' => $request->id_rute,
            'id_stasiun' => $request->id_stasiun,
        ];

        Rute::create($data);

        return redirect()->route('rute');
    }

    public function edit($id)
    {
        $rute = Rute::find($id);
        $stasiun = Stasiun::get();

        return view('rute.form', ['rute' => $rute, 'stasiun' => $stasiun]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'id_rute' => $request->id_rute,
            'id_stasiun' => $request->id_stasiun,
        ];

        Rute::find($id)->update($data);

        return redirect()->route('rute');
    }

    public function hapus($id)
    {
        Rute::find($id)->delete();

        return redirect()->route('rute');
    }
}

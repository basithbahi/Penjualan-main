<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use App\Models\User;
use Illuminate\Http\Request;

class PenumpangController extends Controller
{
    public function index()
    {
        $penumpang = Penumpang::get();

        return view('penumpang.index', ['data' => $penumpang]);
    }

    public function tambah()
    {
        $user = User::get();

        return view('penumpang.form', ['user' => $user]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'nik' => $request->nik,
            'nama' => $request->nama,
            'id_user' => $request->id_user,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
        ];

        Penumpang::create($data);

        return redirect()->route('penumpang');
    }

    public function edit($id)
    {
        $penumpang = Penumpang::find($id);
        $user = User::get();

        return view('penumpang.form', ['penumpang' => $penumpang, 'user' => $user]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'nik' => $request->nik,
            'nama' => $request->nama,
            'id_user' => $request->id_user,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
        ];

        Penumpang::find($id)->update($data);

        return redirect()->route('penumpang');
    }

    public function hapus($id)
    {
        Penumpang::find($id)->delete();

        return redirect()->route('penumpang');
    }
}

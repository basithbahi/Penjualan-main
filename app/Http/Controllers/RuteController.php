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
            'stasiun_keberangkatan' => $request->stasiun_keberangkatan,
            'stasiun_tujuan' => $request->stasiun_tujuan,
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
            'stasiun_keberangkatan' => $request->stasiun_keberangkatan,
            'stasiun_tujuan' => $request->stasiun_tujuan,
        ];

        Rute::find($id)->update($data);

        return redirect()->route('rute');
    }

    public function hapus($id)
    {
        Rute::find($id)->delete();

        return redirect()->route('rute');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $data = Rute::with('stasiun')
                ->where('id_rute', 'like', "%$query%")
                ->orWhere('id_stasiun', 'like', "%$query%")
                ->orWhere('stasiun_keberangkatan', 'like', "%$query%")
                ->orWhere('stasiun_tujuan', 'like', "%$query%")
                ->orderBy('id_rute', 'asc')
                ->paginate(10);
        } else {
            $data = Rute::with('rute')->get();
        }

        return view('rute.index', ['data' => $data, 'query' => $query]);
    }
}

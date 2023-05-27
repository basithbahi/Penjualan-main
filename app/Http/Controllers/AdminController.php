<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::get();

        return view('admin/index', ['admin' => $admin]);
    }

    public function tambah()
    {
        return view('admin.form');
    }

    public function simpan(Request $request)
    {
        $image_name='';
        if($request->file('image')){
            $image_name = $request->file('image')->store('images', 'public');
        }

        Admin::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'ttl' => $request->ttl,
            'jk' => $request->jk,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto_profil' => $image_name,
            'level' => 'Admin'
        ]);

        return redirect()->route('admin');
    }

    public function edit($id)
    {
        $admin = Admin::find($id);

        return view('admin.form', ['admin' => $admin]);
    }

    public function update($id, Request $request)
    {
        $image_name='';
        if($request->file('image')){
            $image_name = $request->file('image')->store('images', 'public');
        }
        
        Admin::find($id)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'ttl' => $request->ttl,
            'jk' => $request->jk,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto_profil' => $image_name,
        ]);

        return redirect()->route('admin');
    }
        public function hapus($id)
        {
            try {
                $admin = Admin::find($id);
        
                // cek jumlah admin dengan level Admin
                $jumlahAdmin = Admin::where('level', 'Admin')->count();
        
                // cek apakah admin memiliki level Admin
                if ($admin->level != 'Admin') {
                    throw new GlobalException("Tidak dapat menghapus admin dengan level bukan Admin.");
                }
        
                // cek apakah jumlah admin dengan level Admin lebih dari satu
                if ($jumlahAdmin > 1) {
                    $admin->delete();
                    return redirect()->route('admin')->with('success', 'Data admin berhasil dihapus');
                } else {
                    throw new GlobalException("Tidak dapat menghapus admin karena hanya terdapat satu admin dengan level Admin.");
                }
            } catch (GlobalException $e) {
                return redirect()->back()->withErrors([$e->getMessage()]);
            }
        }
        
    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $admin = Admin::query()
                ->where('nik', 'like', "%$query%")
                ->orWhere('nama', 'like', "%$query%")
                ->orWhere('alamat', 'like', "%$query%")
                ->orderBy('jk', 'asc')
                ->paginate(10);
        } else {
            $admin = Admin::get();
        }

        return view('admin.index', ['admin' => $admin, 'query' => $query]);
    }
}

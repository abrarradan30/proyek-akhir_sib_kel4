<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemilikKos;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class PemilikKosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query builder
        $pemilik_kos = DB::table('pemilik_kos')->get();
        return view('admin.pemilik_kos.index', compact('pemilik_kos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pemilik_kos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // fungsi untuk mengisi data pada form
        $request->validate([
            'nama' => 'required|max:45',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);
        [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 45 karakter',
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
            'email.required' => 'Email wajib diisi',
            'jk.required' => 'Jenis kelamin wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'telepon.required' => 'Telepon wajib diisi',

        ];
        //fungsi untuk menambahkan pemilik kos
        DB::table('pemilik_kos')->insert([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect('admin/pemilik_kos');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $pemilik_kos =  DB::table('pemilik_kos')->where('id', $id)->get();
        return view('admin.pemilik_kos.detail', compact('pemilik_kos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //arahkan ke file edit yang ada di pemilikmkos view
        $pemilik_kos = DB::table('pemilik_kos')->where('id', $id)->get();
        $ar_jk = ['L', 'P'];

        return view('admin.pemilik_kos.edit', compact('pemilik_kos', 'ar_jk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([

            'nama' => 'required|max:45',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'jk' => 'required',
            'alamat' => 'nullable|string|min:10',
            'telepon' => 'telepon',

        ]);
        //fungsi untuk menambahkan pemilik kos
        DB::table('pemilik_kos')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect('admin/pemilik_kos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('pemilik_kos')->where('id', $id)->delete();
        return redirect('admin/pemilik_kos');
    }
}

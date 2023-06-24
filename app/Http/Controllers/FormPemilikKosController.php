<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemilikKos;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FormPemilikKosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view ('form_pemilikkos');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('form_pemilikkos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // fungsi untuk mengisi data pada form
        $request->validate(
            [
                'nama'     => 'required|max:45',
                'jk'       => 'required',
                'alamat'   => 'required',
                'telepon'  => 'required',
            ],
            [
                'nama.required'     => 'Nama wajib diisi',
                'nama.max'          => 'Nama maksimal 45 karakter',
                'jk.required'       => 'Jenis kelamin wajib diisi',
                'alamat.required'   => 'Alamat wajib diisi',
                'telepon.required'  => 'Telepon wajib diisi',

            ]
        );
        //fungsi untuk menambahkan pemilik kos
        DB::table('pemilik_kos')->insert([
            'nama'     => $request->nama,
            'jk'       => $request->jk,
            'alamat'   => $request->alamat,
            'telepon'  => $request->telepon,
        ]);

        Alert::success('Pemilik Kos', 'Berhasil menambahkan data pemilik kos');
        return redirect('form_pemilikkos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

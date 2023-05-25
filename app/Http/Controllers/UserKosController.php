<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserKos;
use DB;

class UserKosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query builder
        $user = DB::table('user')->get();
        return view('admin.user_kos.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // arahkan ke file create
        return view('admin.user_kos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // fungsi untuk mengisi data pada form
        DB::table('user')->insert([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        return redirect('admin/user');
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
    public function edit($id)
    {
        //
        $user = DB::table('user')->where('id', $id)->get();
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // proses edit form
        DB::table('user')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

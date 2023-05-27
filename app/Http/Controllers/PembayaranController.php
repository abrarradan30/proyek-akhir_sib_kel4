<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query builder
        $pembayaran = DB::table('pembayaran')->get();
        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::table('pembayaran')->insert([
            'no_kwitansi' => $request->no_kwitansi,
            'tanggal'=> $request->tanggal,
            'jumlah'=> $request->jumlah,
            'status'=> $request->status,
        ]);
        return redirect('admin/pembayaran');
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        //
        $pembayaran = DB::table('pembayaran')->where('id', $id)->get();

        return view('admin.pembayaran.detail', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //arahkan ke file edit yang ada di pembayaran view
        $pembayaran = DB::table('pembayaran')->where('id', $id)->get();
        return view('admin.pembayaran.edit', compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        //Buat prose edit form
        DB::table('pembayaran')->where('id', $request->id)->update([
            'no_kwitansi'=> $request->no_kwitansi,
            'tanggal'=> $request->tanggal,
            'jumlah'=> $request->jumlah,
            'status'=> $request->status,
        ]);
        return redirect('admin/pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('pembayaran')->where('id', $id)->delete();

        return redirect('admin/pembayaran');
        
    }
}

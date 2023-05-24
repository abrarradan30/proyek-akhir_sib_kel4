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

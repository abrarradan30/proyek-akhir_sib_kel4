<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
class FormPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('form_pembayaran');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('form_pembayaran');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([  
            'durasi_sewa' => 'required',
            'jumlah_kamar' => 'required|integer',
            'tanggal' => 'required',
            'total' => 'required',
            'bukti' => 'nullable|image|mimes:jpg,jpeg,gif,svg|max:2048',
        ],
        [
            'durasi_sewa.required' => 'Durasi sewa wajib diisi',
            'jumlah_kamar.required' => 'Jumlah kamar wajib diisi',
            'tanggal.required'=> 'Tanggal Wajib Diisi',
            'total.required'=> 'Total Bayar Wajib Diisi',
            'bukti.required'=> 'Bukti Pembayaran Wajib Diisi',
        ]
        );
        //
        if (!empty($request->bukti)) {
            $fileName = 'bukti-' . $request->id . '.' . $request->bukti->extension();
            $request->bukti->move(public_path('admin/image'), $fileName);
        } else {
            $fileName = '';
        }
        DB::table('pembayaran')->insert([
            'durasi_sewa' => $request->durasi_sewa,
            'jumlah_kamar' => $request->jumlah_kamar,
            'tanggal'=> $request->tanggal,
            'total'=> $request->total,
            'bukti'=> $fileName,
        ]);

        Alert::success('Pembayaran', 'Berhasil menambahkan pembayaran');
        return redirect('form_pembayaran');
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

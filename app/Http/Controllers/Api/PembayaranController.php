<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Http\Resources\PembayaranResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class PembayaranController extends Controller
{
    //
    public function index()
    {
        $pembayaran = DB::table('pembayaran')->get();
        return new PembayaranResource(true,'Data Pembayaran',$pembayaran);
    }


    public function show($id)
    {
        $pembayaran = DB::table('pembayaran')->where('id', $id)->get();

        return new PembayaranResource(true, 'Detail Pembayaran', $pembayaran);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'durasi_sewa' => 'required',
                'jumlah_kamar' => 'required|integer',
                'tanggal' => 'required',
                'total' => 'required',
               
            ]);
            if($validator->fails()) {
                return response()->json($validator->errors(), 442);
            }
            $pembayaran = Pembayaran::create([
                'durasi_sewa' => $request->durasi_sewa,
                'jumlah_kamar' => $request->jumlah_kamar,
                'tanggal' => $request->tanggal,
                'total' => $request->total,
                
            ]);
            
        return new PembayaranResource(true, 'data pembayaran berhasil diinput', $pembayaran);
    }
    
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
                'durasi_sewa' => 'required',
                'jumlah_kamar' => 'required|integer',
                'tanggal' => 'required',
                'total' => 'required',
               
            ]);
            if($validator->fails()){
                return response()->json($validator->errors(), 442);
            }
            $pembayaran = Pembayaran::whereId($id)->update([
                'durasi_sewa' => $request->durasi_sewa,
                'jumlah_kamar' => $request->jumlah_kamar,
                'tanggal' => $request->tanggal,
                'total' => $request->total,
            ]);

            return new PembayaranResource(true, 'Data Pembayaran Berhasil Diubah', $pembayaran);
    }

    public function destroy($id){
            $pembayaran = Pembayaran::whereId($id)->first();
            $pembayaran->delete();
    
            return new PembayaranResource(true, 'Data Pembayaran Berhasil Dihapus', $pembayaran);
        }
    }


<?php

namespace App\Imports;

use App\Models\RiwayatPesanan;
use Maatwebsite\Excel\Concerns\ToModel;

class RiwayatPesananImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RiwayatPesanan([
            //
            'durasi_sewa' => $row[1],
            'tanggal' => $row[2], 
            'jumlah_kamar' => $row[3],
            'total' => $row[4],
            'data_kos_id' =>$row[5],
            'pembayaran_id' => $row[6],
            'pelanggan_id' => $row[7],
        ]);
    }
}

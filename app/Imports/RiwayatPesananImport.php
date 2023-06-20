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
            'no_kwitansi' => $row[1],
            'tanggal' => $row[2], 
            'status' => $row[3],
            'data_kos_id' =>$row[4],
            'pembayaran_id' => $row[5],
            'pelanggan_id' => $row[6],
        ]);
    }
}

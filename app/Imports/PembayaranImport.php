<?php

namespace App\Imports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\ToModel;

class PembayaranImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pembayaran([
            'durasi_sewa' => $row[1],
            'jumlah_kamar' => $row[2],
            'tanggal' => $row[3],
            'total' => $row[4],
            //'bukti' => $row[5],
        ]);
    }
}

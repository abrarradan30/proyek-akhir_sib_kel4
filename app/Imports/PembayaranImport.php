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
            'no_kwitansi' => $row[1],
            'tanggal' => $row[2],
            'jumlah' => $row[3],
            'status' => $row[4],
        ]);
    }
}

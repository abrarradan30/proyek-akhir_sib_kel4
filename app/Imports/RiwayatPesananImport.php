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
        ]);
    }
}

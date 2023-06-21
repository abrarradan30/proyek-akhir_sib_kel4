<?php

namespace App\Imports;

use App\Models\PemilikKos;
use Maatwebsite\Excel\Concerns\ToModel;

class PemilikKosImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new PemilikKos([

            'nama' => $row[1],
            'jk' => $row[2],
            'alamat' => $row[3],
            'telepon' => $row[4],

        ]);
    }
}

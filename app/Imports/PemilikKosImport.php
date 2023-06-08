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
            'username' => $row[2],
            'password' => $row[3],
            'email' => $row[4],
            'jk' => $row[5],
            'alamat' => $row[6],
            'telepon' => $row[7],

        ]);
    }
}

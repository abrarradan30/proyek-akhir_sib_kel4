<?php

namespace App\Imports;

use App\Models\UserKos;
use Maatwebsite\Excel\Concerns\ToModel;

class UserKosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new UserKos([
            //
            'nama' => $row[1],
            'email' => $row[2],
            'password' => $row[3],
            'role' =>$row[4],
            //'foto' => $row[5],
        ]);
    }
}

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
            //
        ]);
    }
}

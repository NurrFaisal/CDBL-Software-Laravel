<?php

namespace App\Imports;

use App\admin\PeRatio;
use Maatwebsite\Excel\Concerns\ToModel;

class PeRatioImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PeRatio([
            'date' => $row[0],
            'bo_id' => $row[1],
            'security_code' => $row[2],
            'ratio' => $row[3],
        ]);
    }
}

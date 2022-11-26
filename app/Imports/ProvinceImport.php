<?php

namespace App\Imports;

use App\Models\province_table;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class ProvinceImport implements ToModel , WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new province_table([
            'province'     => $row[0],
            'region'    => $row[1], 
            'area'    => $row[2], 
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}

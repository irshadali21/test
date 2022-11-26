<?php

namespace App\Imports;

use App\Models\ateco_table;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class AtecoImport implements ToModel, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new ateco_table([
            'code'     => $row[0],
            'name'    => $row[1], 
            'description'    => $row[2], 
        ]);
    }


    public function batchSize(): int
    {
        return 1000;
    }
}

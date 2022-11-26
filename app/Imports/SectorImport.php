<?php

namespace App\Imports;

use App\Models\sector_table;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class SectorImport implements ToModel, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new sector_table([
            'name' => $row[0],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
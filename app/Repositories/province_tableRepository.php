<?php

namespace App\Repositories;

use App\Models\province_table;
use App\Repositories\BaseRepository;

/**
 * Class province_tableRepository
 * @package App\Repositories
 * @version November 26, 2022, 3:59 pm CET
*/

class province_tableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'province',
        'region',
        'area'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return province_table::class;
    }
}

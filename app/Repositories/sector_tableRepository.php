<?php

namespace App\Repositories;

use App\Models\sector_table;
use App\Repositories\BaseRepository;

/**
 * Class sector_tableRepository
 * @package App\Repositories
 * @version November 26, 2022, 4:03 pm CET
*/

class sector_tableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return sector_table::class;
    }
}

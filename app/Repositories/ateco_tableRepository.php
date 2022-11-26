<?php

namespace App\Repositories;

use App\Models\ateco_table;
use App\Repositories\BaseRepository;

/**
 * Class ateco_tableRepository
 * @package App\Repositories
 * @version November 26, 2022, 3:57 pm CET
*/

class ateco_tableRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'description'
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
        return ateco_table::class;
    }
}

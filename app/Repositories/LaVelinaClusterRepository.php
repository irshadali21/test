<?php

namespace App\Repositories;

use App\Models\LaVelinaCluster;
use App\Repositories\BaseRepository;

/**
 * Class LaVelinaClusterRepository
 * @package App\Repositories
 * @version November 24, 2022, 7:23 am CET
*/

class LaVelinaClusterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'companies',
        'filters'
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
        return LaVelinaCluster::class;
    }
}

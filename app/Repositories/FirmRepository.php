<?php

namespace App\Repositories;

use App\Models\Firm;
use App\Repositories\BaseRepository;

/**
 * Class FirmRepository
 * @package App\Repositories
 * @version November 27, 2022, 4:02 pm CET
*/

class FirmRepository extends BaseRepository
{
    protected $model;

public function __construct(Firm $model)
{
    $this->model = $model;
}

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'firm_name',
        'firm_vat_no',
        'firm_type',
        'province_id',
        'category',
        'phone_number',
        'firm_owner',
        'email',
        'email2',
        'sector_id',
        'ateco_id',
        'created_by'
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
        return Firm::class;
    }


    public function UserCriteria(){
        if (auth()->check() && auth()->user()->hasRole('super-admin')) {
            return $this->model;
        } else {
            return $this->model->where('created_by', auth()->user()->id);
        }
    }
}

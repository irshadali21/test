<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\ateco_table;
use App\Models\province_table;
use App\Models\sector_table;
/**
 * Class Firm
 * @package App\Models
 * @version November 27, 2022, 4:02 pm CET
 *
 * @property string $firm_name
 * @property string $firm_vat_no
 * @property string $firm_type
 * @property integer $province_id
 * @property string $category
 * @property string $phone_number
 * @property string $firm_owner
 * @property string $email
 * @property string $email2
 * @property integer $sector_id
 * @property integer $ateco_id
 * @property integer $created_by
 */
class Firm extends Model
{

    public $table = 'firms';
    



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'id' => 'integer',
    //     'firm_name' => 'string',
    //     'firm_vat_no' => 'string',
    //     'firm_type' => 'string',
    //     'province_id' => 'integer',
    //     'category' => 'string',
    //     'phone_number' => 'string',
    //     'firm_owner' => 'string',
    //     'email' => 'string',
    //     'email2' => 'string',
    //     'sector_id' => 'integer',
    //     'ateco_id' => 'integer',
    //     'created_by' => 'integer'
    // ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function ateco()
    {
        return $this->hasOne(ateco_table::class,'id','ateco_id');
    }
    public function sector()
    {
        return $this->hasOne(sector_table::class,'id','sector_id');
    }
    public function province()
    {
        return $this->hasOne(province_table::class,'id','province_id');
    }

    
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class province_table
 * @package App\Models
 * @version November 26, 2022, 3:59 pm CET
 *
 * @property string $province
 * @property string $region
 * @property string $area
 */
class province_table extends Model
{
    use SoftDeletes;

    public $table = 'province_tables';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'province',
        'region',
        'area'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'province' => 'string',
        'region' => 'string',
        'area' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

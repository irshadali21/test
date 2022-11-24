<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LaVelinaCluster
 * @package App\Models
 * @version November 24, 2022, 7:23 am CET
 *
 * @property string $name
 * @property string $companies
 * @property string $filters
 */
class LaVelinaCluster extends Model
{
    use SoftDeletes;

    public $table = 'la_velina_clusters';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'companies',
        'filters'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

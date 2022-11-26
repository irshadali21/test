<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ateco_table
 * @package App\Models
 * @version November 26, 2022, 3:57 pm CET
 *
 * @property string $code
 * @property string $name
 * @property string $description
 */
class ateco_table extends Model
{
    use SoftDeletes;

    public $table = 'ateco_tables';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'code',
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required'
    ];

    
}

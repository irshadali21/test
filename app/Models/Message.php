<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Message
 * @package App\Models
 * @version December 12, 2022, 3:05 pm CET
 *
 * @property integer $from_user
 * @property integer $to_user
 * @property string $message
 * @property integer $is_read
 */
class Message extends Model
{

    public $table = 'messages';
    



    public $fillable = [
        'from_user',
        'to_user',
        'message',
        'is_read'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'from_user' => 'integer',
        'to_user' => 'integer',
        'message' => 'string',
        'is_read' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

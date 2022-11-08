<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LeVelina extends Model
{
    protected $guarded = ['id'];
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            if ( !$model->uid ) {
               
                    $model->uid = Str::uuid()->toString();
            }
        });
    }
}

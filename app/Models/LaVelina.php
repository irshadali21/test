<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\User;
use App\Models\LavelinaDetail;

class LaVelina extends Model
{
    protected $guarded = ['id'];

    public $table = 'le_velinas';

    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            if ( !$model->uid ) {
               
                    $model->uid = Str::uuid()->toString();
            }
        });
    }

    public function advisor()
    {
        return $this->hasOne(User::class,'id','advisor_id');
    }
    public function details()
    {
        return $this->hasMany(LavelinaDetail::class,'id','advisor_id');
    }

}

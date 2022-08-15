<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class File extends Model
{
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            // $model->{'uid'} = HelperFunction::_uid();

            if ( !$model->created_by ) {
                if(Auth::user()->id)
                    $model->created_by = Auth::user()->id;
            }
        });
    }

    public function auditor()
    {
        return $this->hasOne(User::class,'id','created_by');
    }

}

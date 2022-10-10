<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;
class EmailTrack extends Model
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

    public function created_by()
    {
        return $this->hasOne(User::class,'id','created_by');
    }
}

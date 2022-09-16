<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\File;

class Certificate extends Model
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
    public function file()
    {
        return $this->hasOne(File::class,'id','file_id');
    }
}

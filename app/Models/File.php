<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Company;
use App\Models\Summary;
use App\Models\Certificate;



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

    public function advisor()
    {
        return $this->hasOne(User::class,'id','advisor_id');
    }
    
    public function company()
    {
        return $this->hasOne(Company::class,'id','company_id');
    }
    public function benefit()
    {
        return $this->hasOne(Summary::class,'id','benefit_id');
    }
    public function certificate()
    {
        return $this->hasOne(Certificate::class,'file_id','id');
    }

}

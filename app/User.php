<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, LogsActivity, ThrottlesLogins, SoftDeletes;
    protected static $ignoreChangedAttributes = ['password'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'profile_photo', 'status', 
        'advoiser_stamp', 'ofc_address', 'accountant_reg_no', 'acc_city', 'auditor_reg_no', 'email_pec',
        'ofc_name', 'insurance_no', 'insurance_company', 'code'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected static $logFillable = true;
    protected static $logName = 'user';
    protected static $logOnlyDirty = true;
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            if ( !$model->created_by ) {
                
                    $model->created_by = auth()->user()->id;
            }
        });
    }



    public function setStatusAttribute($status)
    {
        $this->attributes['status'] = ($status)? 1 : 0;
    }
    public function setPasswordAttribute($password)
    {
        if(Hash::needsRehash($password)){
            $password = Hash::make($password);
            $this->attributes['password'] = $password;
        }
    }
    public function categories()
    {
        return $this->hasMany('App\Category');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}

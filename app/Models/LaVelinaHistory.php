<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Firm;
use App\Models\LaVelina;
use App\Models\LaVelinaCluster;

class LaVelinaHistory extends Model
{
    
    // public $table = 'la_velina_histories';

    protected $guarded = ['id'];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function email_sent_by()
    {
        return $this->hasOne(User::class,'id','sent_by');
    }
    public function valina()
    {
        return $this->hasOne(LaVelina::class,'id','lavelina_id');
    }
    public function firm()
    {
        return $this->hasOne(Firm::class,'id','firm_id');
    }
    public function cluster()
    {
        return $this->hasOne(LaVelinaCluster::class,'id','cluster_id');
    }
}

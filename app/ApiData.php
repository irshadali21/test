<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class ApiData extends Model
{
    use LogsActivity;

    protected $fillable = ['category_name','status','user_id'];

    protected static $logFillable = true;
    protected static $logName = 'Api Data';
    protected static $logOnlyDirty = true;
        

    
}

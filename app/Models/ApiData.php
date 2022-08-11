<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class ApiData extends Model
{
    use LogsActivity;

    protected $guarded = ['id'];

    protected static $logFillable = true;
    protected static $logName = 'Api Data';
    protected static $logOnlyDirty = true;
        

    
}

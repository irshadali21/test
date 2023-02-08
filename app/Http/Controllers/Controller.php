<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function formatedDate($date)
    {
        $day = Carbon::parse($date)->format('D');
        $day = __('lang.'.$day);
        $datef = Carbon::parse($date)->format('m/d/Y H:i');
        return $day.' '.$datef;
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;


class StampCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (auth()->user()->advoiser_stamp =='' || is_null(auth()->user()->advoiser_stamp)) {
            if(!request()->is('profile*')){
                if(!auth()->user()->hasrole('super-admin')){
                    flash('Complete Your Profile Please')->warning();
                    return redirect(RouteServiceProvider::editprofile);
                }
            }
        }

        return $next($request);
    }
}

<?php namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use App;
class Locale
{

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (Session::has('locale')) {
                $locale = Session::get('locale');
                app()->setLocale($locale);
                Carbon::setLocale($locale);
            }
        } catch (Exception $exception) {
        }

        return $next($request);
    }

   
}


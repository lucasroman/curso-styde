<?php

namespace App\Http\Middleware;

use App;
use Closure;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     /* This middleware check if there is a lenguage selected and set the
        application's lenguage to this one in each request, so remember the
        language selected in different views.
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('locale')) {
            App::setLocale($request->session()->get('locale'));
        }
        return $next($request);
    }
}

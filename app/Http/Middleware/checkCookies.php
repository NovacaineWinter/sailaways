<?php

namespace App\Http\Middleware;

use Closure;

class checkCookies
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
            if($request->cookie('acceptCookies') !== null){
                \Illuminate\Support\Facades\View::share('cookiesOk', true);
            }else{
                \Illuminate\Support\Facades\View::share('cookiesOk', false);
            }
        return $next($request);
    }
}

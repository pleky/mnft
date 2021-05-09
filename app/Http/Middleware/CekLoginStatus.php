<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class CekLoginStatus
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
        if(!Session::get('login') or Session::get('login')==false)
        {
            return redirect('/login');
        }else{
            return $next($request);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class adminSession
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
        if(!$request->session()->has('username_admin')){
            return redirect('/login/admin');
        }
        return $next($request);
    }
}

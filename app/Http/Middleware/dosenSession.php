<?php

namespace App\Http\Middleware;

use Closure;

class dosenSession
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
        if(!$request->session()->has('nidn_dosen')){
            return redirect('/login/dosen');
        }
        return $next($request);
    }
}

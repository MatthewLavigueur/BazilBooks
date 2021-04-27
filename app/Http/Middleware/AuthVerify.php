<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthVerify
{
    public function handle($request, Closure $next)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
        return $next($request);
    }
}





?>
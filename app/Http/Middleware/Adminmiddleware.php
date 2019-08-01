<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Adminmiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::check())
        {
            if($request->user()->role=='admin')
            {
               return $next($request);
            }
             return redirect('/');    
        }

        return redirect('/login');
    }

}

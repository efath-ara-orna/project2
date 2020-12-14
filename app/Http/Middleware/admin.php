<?php

namespace App\Http\Middleware;

use Closure;
use Auth; //at the top

class admin
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
       if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'parents') {
            return redirect('/parents');
        }
        elseif (Auth::check() && Auth::user()->role == 'teacher') {
            return redirect('/teacher');
        }
        else {
            return redirect('/unauthorized');
        }
    }
}

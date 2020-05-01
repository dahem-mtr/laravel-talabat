<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Employee
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
        if (Auth::user() ) {
            if (Auth::user()->group->name == 'admins' ||  Auth::user()->group->name == 'employees') {
            return $next($request);
        }
     }

    return redirect('/home');
    }
}

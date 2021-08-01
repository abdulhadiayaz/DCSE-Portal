<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::check()){
            $adminRole = Auth::user()->roles->pluck('name');
            if ($adminRole->contains('admin')){
                return $next($request);
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

    }
}

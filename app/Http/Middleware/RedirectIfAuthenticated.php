<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                if(Auth::check() && Auth::user()->role == 'staff'){
                    return redirect('/staff/dashboard');
                }
                if(Auth::check() && Auth::user()->role == 'manager'){
                    return redirect('/manager/dashboard');
                }

                if(Auth::check() && Auth::user()->role == 'hr'){
                    return redirect('/hr/dashboard');
                }

                if(Auth::check() && Auth::user()->role == 'sales'){
                    return redirect('/sales/dashboard');
                }

                if(Auth::check() && Auth::user()->role == 'admin'){
                    return redirect('/admin/dashboard');
                }
            }
        }
        return $next($request);
    }
}

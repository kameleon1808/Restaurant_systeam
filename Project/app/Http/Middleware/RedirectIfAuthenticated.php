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
            // if (Auth::guard($guard)->check()) {
            //     return redirect(RouteServiceProvider::HOME);
            // }
            if (Auth::guard($guard)->check() && Auth::user()->role == 1) {
                // return redirect()->route('boss.home');
                return view('dashboard.boss.home');
            } else if (Auth::guard($guard)->check() && Auth::user()->role == 2) {
                // return redirect()->route('user.home');
                return view('dashboard.user.home');
            } else if (Auth::guard($guard)->check() && Auth::user()->role == 3) {
                // return redirect()->route('user.home');
                return view('dashboard.waiter.home');
            } else if (Auth::guard($guard)->check() && Auth::user()->role == 4) {
                // return redirect()->route('user.home');
                return view('dashboard.state.home');
            } else if (Auth::guard($guard)->check() && Auth::user()->role == 5) {
                // return redirect()->route('user.home');
                return view('dashboard.legal.home');
            } else if (Auth::guard($guard)->check() && Auth::user()->role == 6) {
                // return redirect()->route('user.home');
                return view('dashboard.rest-boss.home');
            }
        }

        return $next($request);
    }
}

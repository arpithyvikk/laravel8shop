<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use session;
class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('utype') === 'AMD')
        {
            return $next($request);
        }
        else
        {
            // return dd(session('utype'));
            session()->flush();
            return redirect()->route('login');
        }
        return $next($request);
    }
}

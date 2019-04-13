<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
          if(Auth::user()->user_type == config('const.user_type.sys_admin')) {
            return redirect('/sys_admin');
          }else if(Auth::user()->user_type == config('const.user_type.student')) {
            return redirect('/student/complaints');
          }else if(Auth::user()->user_type == config('const.user_type.lecturer')) {
            return redirect('/lecturer');
          }
        }


        return $next($request);
    }
}

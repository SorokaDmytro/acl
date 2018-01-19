<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEmployeeRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next) {
      if(Auth::check() && Auth::user()->role == 'owner') {
        return $next($request);
      }
      if(Auth::check() && Auth::user()->role == 'employee') {
        return $next($request);
      }
      return abort(403);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
      if(Auth::check() && (Auth::user()->role=='admin' || Auth::user()->role=='author')){
        return $next($request);

      }else{
        return view('errors.404');
      }
    }
}

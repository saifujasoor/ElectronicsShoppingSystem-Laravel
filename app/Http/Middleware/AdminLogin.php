<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;
class AdminLogin
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
        if(!empty(Auth::user()) && Auth::user()->admin==1){
            return $next($request);
        }else{
            return redirect()->route('admin-login')->with('flash_message_error','Please login to access');
        }
    }
}

// empty($Session::has('frontSession')) && 
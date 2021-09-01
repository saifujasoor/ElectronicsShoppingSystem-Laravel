<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;
class FrontLogin
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
        // echo "<pre>";
        // print_r(Auth::user());die;
        if(!empty(Auth::user()) && Auth::user()->admin==0){
            return $next($request);
        }else{
            // echo "<pre>";
            // print_r(Auth::user());die;
            Session::forget('frontSession');
            // echo "<pre>";
            // print_r($Session); die;
            return redirect()->route('customer-login')->with('flash_message_error','Please login to access');
        }
    }
}

// empty($Session::has('frontSession')) && 
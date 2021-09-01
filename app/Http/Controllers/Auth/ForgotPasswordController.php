<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use  Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function forgot()
    {
        $credentials=request()->validate(['email'=>'required|email']);
        Password::sendResetLink(@$credentials);
        return response()->json(["msg"=>"Reset password linl sent on your email id."]);
    }
}

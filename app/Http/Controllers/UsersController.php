<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use Session;
use App\User;
use App\Area;
use App\City;
use App\State;
use App\DeliveryAddress;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function registeruser(){
        return view('users.register');
    }

    public function userRegister(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            // echo "<pre>"; print_r($data); die;
            $emailCount = User::where('email',$data['email'])->count();
            $mobileCount = User::where('mobile',$data['mobile'])->count();
            if($emailCount>0){
                return redirect()->back()->with('flash_message_error','Email is already exist');
            }
            if($mobileCount>0){
                return redirect()->back()->with('flash_message_error','Mobile is already exist');
            }else{
                $user = new User;
                $user->name = $data['name'];
                $user->mobile = $data['mobile'];
                if(!empty($data['email'])){
                    $user->email = $data['email'];
                }else{
                    $user->email = '';
                }
                $user->admin = 0;
                $user->password = bcrypt($data['password']);
                $user->save();
                return redirect('/login-user');
            }
        }
    }

    public function loginuser(){
        return view('users.login');
    }

    public function userLogin(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            // echo "<pre>"; print_r($data);die;
            
            if(Auth::attempt(['email' =>$data['email'], 'password' => $data['password']])|| Auth::attempt(['mobile' => request('mobile'), 'password' => request('password')])){
                Auth::user()->id;
                Session::put('frontSession',$data['email'] || $data['mobile']);
                return redirect('/');
            }else{
                return redirect()->back()->with('flash_message_error','Invalid Email and Password');
            }
        }
    }

    public function userlogout(){
        Auth::logout();
        Session::forget('frontSession');
        return redirect('/');
    }
    
    public function account(Request $req){
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);
        $areas = Area::get();
        $deliveryAddress = deliveryAddress::where('user_id',Auth::User()->id)->orderBy('flag', 'DESC')->get();
        if($req->isMethod('post')){
            $data = $req->all();
            if(empty($data['name'])){
                return redirect()->back()->with('flash_message_error','Please enter your Name to update to account details!');
            }
            if(empty($data['email'])){
                $data['email']= '';
            }
            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->mobile = $data['mobile'];
            $user->save();
            return redirect()->back()->with('flash_message_success','Your account details has been updated successfully!');
        }
        return view('users.account')->with(compact('userDetails','deliveryAddress','areas'));
    }

    public function chkUserPassword(Request $req){
        $data = $req->all();
        // echo "<pre>"; print_r($data); die;
        $old_pass = $data['old_pass'];
        $user_id = Auth::User()->id;
        $check_password = User::where('id',$user_id)->first();
        if(Hash::check($old_pass,$check_password->password)){
            echo "true"; die;
        }
        else{
            echo "false"; die;
        }
    }

    public function updatePassword(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            $old_pwd = User::where('id',Auth::User()->id)->first();
            $old_pass = $data['old_pass'];
            if(Hash::check($old_pass,$old_pwd->password)){
                // Update Password
                $login_pass = bcrypt($data['login_pass']);
                User::where('id',Auth::User()->id)->update(['password'=>$login_pass]);
                return redirect()->back()->with('flash_message_success','Password Updated Successfully!');
            }else{
                return redirect()->back()->with('flash_message_error','Current Password incorrect!');
            }

        }
    }

    public function forgotPassword(){
        return view('users.forgot_password');
    }
    
    public function userForgotPassword(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            $usercount = User::where('email',$data['email'])->count();
            if($usercount == 0){
                return redirect()->back()->with('flash_message_error','Email does not Exist!');
            }

            // Get User Details
            $userDetails = User::where('email',$data['email'])->first();

            // Generate Random Password
            $random_password = str_random(8);

            // Encode/Secure Password
            $new_password = bcrypt($random_password);

            // Update Password
            User::where('email',$data['email'])->update(['password'=>$new_password]);

            // Send Forgot Password Email Code
            $email = $data['email'];
            $name = $userDetails->name; 
            $messageData = [
                'email'=>$email,
                'name' => $name,
                'password'=>$random_password
            ];
            Mail::send('emails.forgotpassword',$messageData,function($message)use($email){
                $message->to($email)->subject('New Password - E-Com Website');
            });

            return redirect('/login-user')->with('flash_message_success','Please check your email for new password!');
        }
    }
}

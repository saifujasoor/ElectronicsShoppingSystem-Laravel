<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Company;

class ContactController extends Controller
{
    public function contact(){
        $companies = Company::get();
        return view('pages.contact')->with(compact('companies'));
    }

    public function contactus(Request $req){
        if($req->isMethod('post')){
            $data = $req->all();
            // echo "<pre>"; print_r($data); die;
            
            $validator = Validator::make($req->all(),[
                'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'email' => 'required|email',
                'mobile'=> 'required',
                'subject' => 'required',
            ]);

            if($validator->fails()){
                return redirect()->withErrors($validator)->withInput();
            }

            // Send Contact Email
            $email = "codewithsaifullah@gmail.com";
            $messageData = [
                'name'=>$data['name'],
                'email'=>$data['email'],
                'mobile'=>$data['mobile'],
                'subject'=>$data['subject'],
                'content'=>$data['content']
            ];
            Mail::send('emails.enquiry',$messageData,function($message)use($email){
                $message->to($email)->subject('Enquiry from E-com Website');
            });
            
            return redirect()->back()->with('flash_message_success','Thanks for your enquiry. we will get back to you soon.');
        }
    }

    public function about(){
        return view('pages.about');
    }
}

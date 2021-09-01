<style>
   .error {
      color: red;
      background-color:white;
      font-weight:400;
      font-size: 13px;
   }

   input:focus{
   outline: none !important;
   }

   input.error{
   outline:red groove thin;
   }

   label{
     color:#666666;
     font-weight: 600;
   }
</style>
@extends('layouts.frontLayout.front_design')
@section('content')
  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">Register</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="index-2.html">Home</a>/</li>
            <li><span>Register</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END --> 
  
  <!-- CONTAIN START -->
  <section class="checkout-section ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-8 ">
              @if (Session::has('flash_message_error')) 
              <div class="alert alert-error alert" style="background-color: #F8D7DA">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{!! session('flash_message_error') !!}  </strong>
              </div>         
              @endif  
              @if (Session::has('flash_message_success')) 
              <div class="alert alert-success alert" style="background-color: #D4EDDA">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{!! session('flash_message_success') !!}  </strong>
              </div>         
              @endif    
              <form action="{{ url('/user-register') }}" method="post" id="registerForm" name="registerForm" class="main-form">{{ csrf_field()}}
                <div class="row">
                  <div class="col-12 mb-20">
                    <div class="heading-part heading-bg">
                      <h2 class="heading">Create your account</h2>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="your-name">Your Name</label>
                      <input type="text" id="name" name="name" placeholder="Enter Your Name" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="mobile-no">Mobile Number</label>
                      <input type="number" id="mobile" name="mobile" pattern="\d{3}[\-]\d{3}[\-]\d{4}" placeholder="Mobile Number" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="email">Email Address </label>
                      <input id="email" id="email" name="email" placeholder="Email Address">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="login-pass">Password</label>
                      <input id="password" type="password" name="password" placeholder="Enter your Password" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="password_confirm">Confirm Password</label>
                      <input id="password_confirm" name="password_confirm" type="password" placeholder="Confirm your Password" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="check-box left-side mb-20"> 
                      
                    </div>
                    <button name="submit" id="submit" type="submit" class="btn-color right-side">SignUp</button>
                </div>
                  <div class="col-12">
                    <div class="new-account align-center mt-20"> <span>Already have an account with us</span> <a class="link" title="Register with Stylexpo" href="{{ url('/login-user') }}">Login Here</a> </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  @endsection

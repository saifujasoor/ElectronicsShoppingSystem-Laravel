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
        <h1 class="banner-title">Login</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="index-2.html">Home</a>/</li>
            <li><span>Login</span></li>
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
              <form action="{{ url('/user-login') }}" method="post" id="loginForm" class="main-form full">{{ csrf_field() }}
                <div class="row">
                  <div class="col-12 mb-20">
                    <div class="heading-part heading-bg">
                      <h2 class="heading">Customer Login</h2>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="login-email">Email or mobile phone number</label>
                      <input id="login-email" name="email" type="text" placeholder="Email or mobile phone number">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-box">
                      <label for="login-pass">Password</label>
                      <input id="apassword" name="password" type="password" placeholder="Enter your Password">
                    </div>
                  </div>
                  <div class="col-12">
                    <a title="Forgot Password" class="forgot-password mtb-20" href="{{ url('/forgot-password') }}">Forgot your password?</a>
                    <button name="submit" type="submit" class="btn-color right-side">Log In</button>
                  </div>
                  <hr>
                  <div class="col-12">
                    <div class="new-account align-center mt-20"> <span>New to A to Z Electronics?</span> <a class="link" title="Register with Stylexpo" href="{{ url('/register-user') }}">Create New Account</a> </div>
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
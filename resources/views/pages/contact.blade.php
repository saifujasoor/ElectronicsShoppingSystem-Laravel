<style>
    input,textarea{
        border: 1px solid #c4c4c4;
        border-radius: 5px;
    }
    input[type=text]:focus  {
        border: 1px solid red;
    }
    input[type=email]:focus  {
        border: 1px solid red;
    }
    input[type=number]:focus  {
        border: 1px solid red;
    }
    textarea[type=text]:focus{
        border: 1px solid red;
    }
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
      <section class="banner-detail  center-xs">
        <h1 class="banner-title">Contact us</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="{{ url('/') }}">Home</a>/</li>
            <li><span>Contact Us</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->
  
<!-- CONTAIN START ptb-95-->
<section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="heading-part mb-30">
            <h2 class="main_title  heading"><span>Leave a message!</span></h2>
          </div>
        </div>
      </div>
  
      @if (Session::has('flash_message_success')) 
        <div class="alert alert-success alert" style="background-color: #D4EDDA">
          <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{!! session('flash_message_success') !!}  </strong>
        </div>         
      @endif 
      @if (Session::has('flash_message_success')) 
        <div class="alert alert-success alert" style="background-color: #D4EDDA">
          <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{!! session('flash_message_success') !!}  </strong>
        </div>         
      @endif 
      @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
      @endif
      <div class="main-form">
        <form action="{{ url('/contact-us') }}" method="POST" name="contactform">{{ csrf_field() }}
          <div class="row">
            <div class="col-md-6 mb-30">
              <input type="text" placeholder="Full Name" id="name" name="name">
            </div>
            <div class="col-md-6 mb-30">
              <input type="text" placeholder="Email Address" id="email" name="email">
            </div>
            <div class="col-md-6 mb-30">
              <input type="text" placeholder="Mobile No" id="mobile" name="mobile">
            </div>
            <div class="col-md-6 mb-30">
              <input type="text" placeholder="Enter Your Subject" id="subject" name="subject">
            </div>
            <div class="col-12 mb-30">
              <textarea type="text" placeholder="Your Message Here" rows="6" cols="30" id="content" name="content"></textarea>
            </div>
            <div class="pl-3">
              <div class="align-center">
                <button type="submit" name="submit" class="btn btn-color" style="padding: 16px 34px; font-size: 17px;">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  @foreach ($companies as $comp)
  <section class="pt-40 client-main align-center my-5">
    <div class="container">
      <div class="contact-info">
        <div class="row m-0">
          <div class="col-md-4 p-0">
            <div class="contact-box">
              <div class="contact-icon contact-phone-icon"></div>
              <span><b>Tel</b></span>
                <p>{{ $comp->mobile }}</p>
            </div>
          </div>
          <div class="col-md-4 p-0">
            <div class="contact-box">
              <div class="contact-icon contact-mail-icon"></div>
              <span><b>Mail</b></span>
              <p>{{ $comp->email }} </p>
            </div>
          </div>
          <div class="col-md-4 p-0">
            <div class="contact-box">
              <div class="contact-icon contact-open-icon"></div>
              <span><b>Open</b></span>
              <p>Mon – Sat: 9:00 – 18:00</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endforeach
  <!-- CONTAINER END --> 

  @endsection
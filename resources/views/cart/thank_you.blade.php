@extends('layouts.frontLayout.front_design') 
@section('content')

<section class="ptb-70 gray-bg error-block-main">
    <div class="container">
        <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                <img src="{{ asset('images/frontend_images/thankyou.jpg')}}" alt="thankyou">
                </div>
                <div class="col-xl-7 col-lg-6 mt-5">
                <div class="error-small-text-center" style="margin-left: auto;margin-right: auto;width: 15%;"><img src="{{ asset('images/frontend_images/tick.gif')}}" alt="order Placed" class="center">
                    <h3 class="my-4" style="font-weight:600; color:#666666;">Success</h3>
                </div>
                <div class="error-slogan text-center" style="margin-bottom: 20px;">Yay! Your Order has been successfully placed..</div>
                <ul class="social-icon mb-20 text-center">
                    <li style="font-size: 16px; font-weight:600;">Having trouble?<a href="{{('/contact')}}" style="font-weight:400;"> &nbsp;Contact us</a></li>
                </ul>
                <div class="middle" style="margin-left: auto;margin-right: auto;width:46.8%;">
                    <a href="{{url('/')}}" class="btn btn-color">Back to Home</a>
                    <a href="{{url('/orders')}}" class="btn btn-color">Your Orders</a>
                </div>
                <div class="error-slogan text-center mt-4">Thanks! for visiting our website..</div>
                <div class="mt-40">  </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </section>
@endsection
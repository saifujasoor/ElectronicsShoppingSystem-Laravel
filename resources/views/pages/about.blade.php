<?php
use App\Http\Controllers\Controller;
$companies = Controller::companies();
?>

@extends('layouts.frontLayout.front_design')
@section('content') 

  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">About us</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="{{ url('/') }}">Home</a>/</li>
            <li><span>About Us</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->  

  <section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="responsive-part">
            <div class="row">
              <div class="col-sm-12 partner-detail-main">
                <div class="heading-part">
                  <h2 class="main_title"><span>Welcome to our Site</span></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="responsive-part">
            <div class="row">
              <div class="col-sm-12 partner-detail-main">
                <div class="heading-part mb-30">
                  <p class="footer-main">
					          <span>"A to Z Electronics"</span> is a web-based application which will allows customer to purchase a product using internet and It will provide online purchasing of various kinds of Mobiles, Teblets & Ipads.
                    We have been in the business for quite a while now, and it that time we have not only managed to make close relationships with numerous suppliers all over the country, but also to recognize what people need. This means that we are always able to offer all the latest phones, great prices, reliable service, fast delivery and premium customer support.
				          </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

   <section class=" client-main align-center my-5">
    <div class="container">
      <div class="contact-info">
        @foreach ($companies as $comp)
        <div class="row m-0">
          <div class="col-md-4 p-0">
            <div class="contact-box">
              <div class="contact-icon contact-phone-icon"></div>
              <span><b>Tel</b></span>
              <p>{{$comp->mobile}}</p>
            </div>
          </div>
          <div class="col-md-4 p-0">
            <div class="contact-box">
              <div class="contact-icon contact-mail-icon"></div>
              <span><b>Mail</b></span>
              <p>{{$comp->email}}</p>
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
        @endforeach
      </div>
    </div>
  </section>
@endsection
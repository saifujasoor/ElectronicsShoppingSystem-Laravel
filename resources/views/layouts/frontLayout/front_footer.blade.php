<?php
use App\Http\Controllers\Controller;
$companies = Controller::companies();
?>

  <!-- FOOTER START -->
  <div class="footer">
    <div class="container">
      <div class="footer-inner">
        <div class="footer-middle">
          <div class="row">
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <div class="f-logo"> 
                  <a href="{{ url("/") }}" class=""> 
                    <img alt="Stylexpo" src="{{ asset('images/backend_images/logo/logo1.png')}}" style="height: 60px; width: 139px;">
                  </a> 
                </div>
                <div class="footer-block-contant">
                    <p>A to Z Electronic System is a web site will allow customer to purchase a product using internet and It will provide online purchasing of various kinds of Mobiles, Teblets & Ipads.</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">Help <span></span></h3>
                <ul class="footer-block-contant link">
                  @if (!empty(Auth::check()) && Auth::user()->admin==0)
                    <li><a href="{{url('/contact')}}">Contact Us</a></li>
                    <li><a href="{{url('/orders')}}">Order Status</a></li>
                  @endif
                </ul>
              </div>
            </div>
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">Pages <span></span></h3>
                <ul class="footer-block-contant link">
                  <li><a href="{{url('/')}}"> Home</a></li>
                  <li><a href="{{url('/about')}}"> About Us</a></li>
                  <li><a href="{{ url('/') }}"> Contact Us</a></li>
                  @if (!empty(Auth::check()) && Auth::user()->admin==0)
                    <li><a href="{{url('/account')}}"> Account</a></li>
                    <li><a href="{{url('/orders')}}"> My Orders</a></li>
                  @endif
                </ul>
              </div>
            </div>
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">address<span></span></h3>
                <ul class="footer-block-contant address-footer">
                  @foreach ($companies as $comp)
                    <li class="item"> <i class="fa fa-map-marker"> </i>
                      <p>{{$comp->address}}</p>
                    </li>
                    <li class="item"> <i class="fa fa-envelope"> </i>
                      <p> <a href="#">{{$comp->email}} </a> </p>
                    </li>
                    <li class="item"> <i class="fa fa-phone"> </i>
                      <p>(+91) {{$comp->mobile}}</p>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="footer-bottom ">
          <div class="row mtb-30">
            <div class="col-lg-12 text-center">
              <div class="copy-right ">© 2021 All Rights Reserved. Design By MCA Students Of MEFGI(Rakesh K,Saifullah Rahimi,Rahul Z) <a href="{{url('/')}}">A to Z Electronics</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="scroll-top">
    <div class="scrollup"></div>
  </div>
  <!-- FOOTER END --> 
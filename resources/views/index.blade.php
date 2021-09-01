@extends('layouts.frontLayout.front_design')
@section('content')
<!-- BANNER STRAT -->
  <section class="">
    <div id="owl-example" class="banner owl-carousel">
      <div class="main-banner">
        <div class="item">
          <div class="banner-1"> <img src="{{ asset('images/frontend_images/baner3.jpg')}}" alt="Stylexpo" style="width: 100%;height: 700px;">
            <div class="banner-detail">
              <div class="container">
                <div class="row">
                  <div class="col-lg-5 col-4"></div>
                  <div class="col-lg-7 col-8">
                    <div class="banner-detail-inner"> 
                      <span class="slogan">UP TO 25% OFF</span>
                      <h1 class="banner-title">Smart Mobile Phones</h1>
                      <span class="offer">The latest brand mobile phones.</span>
                    </div>
                    <a class="btn btn-color" href="{{url('/')}}">Shop Now!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="banner-2"> <img src="{{ asset('images/frontend_images/baner1.jpg')}}" alt="Stylexpo" style="width: 100%; height: 700px;">
            <div class="banner-detail">
              <div class="container">
                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-8 col-8">
                    <div class="banner-detail-inner"> 
                      <span class="slogan">new look</span>
                      <h1 class="banner-title">Get Latest Laptops </h1>
                      <span class="offer">Get the top brands for laptops.</span> 
                    </div> 
                      <a class="btn btn-color" href="{{url('/')}}">Shop Now!</a>
                  </div>
                  <div class="col-lg-3 col-4"></div>              
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="banner-3"> <img src="{{ asset('images/frontend_images/baner2.jpg')}}" alt="Stylexpo" style="width: 100%; height: 700px;">
            <div class="banner-detail">
              <div class="container">
                <div class="row">
                  <div class="col-lg-5 col-md-5 col-4"></div>
                  <div class="col-lg-7 col-md-7 col-8">
                    <div class="banner-detail-inner"> 
                      <span class="slogan">UP TO 30% OFF</span>
                      <h1 class="banner-title">Get latest Ipads</h1>
                      <span class="offer">Get the top brands for Ipads</span> 
                    </div>
                      <a class="btn btn-color" href="{{url('/')}}">Shop Now!</a>
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- BANNER END --> 
  
  <!-- CONTAIN START -->
    
     <!--  New arrivals Products Slider Block Start  -->
     <section class="pt-70">
      <div class="container">
        <div class="product-listing">
          <div class="row">
            <div class="col-12">
              <div class="heading-part mb-30">
                <h2 class="main_title heading"><span>Mobile Phones <span style="color:#ff3030;">&</span> Tablets</span></h2>
              </div>
            </div>
          </div>
          <div class="pro_cat">
            <div class="row">
              <div class="owl-carousel pro-cat-slider ">
                @foreach ($productsAll as $pro)
                <div class="item">
                  <div class="product-item mb-30">
                    <div class="product-image"> <a href="{{ url('product/'.$pro->id) }}"> <img src="{{ asset('images/backend_images/product/small/'.$pro->image)}}" alt="Stylexpo"> </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <li class="pro-cart-icon">
                              <button onclick="document.location='{{ url('product/'.$pro->id)}}'" title="Add to Cart"><span></span>View Details</button>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    @php 
                        $getProductPrice = \App\ProductsAttribute::where("product_id","=",$pro->id)->first();
                     @endphp
                     
                    <div class="product-item-details">
                    <div class="product-item-name"> <a href="{{ url('product/'.$pro->id)}}">{{ $pro->product_name }}&nbsp;({{$getProductPrice->color??""}},{{ $getProductPrice->ram??"" }},{{ $getProductPrice->storage??"" }})</a> </div>
                    <div class="price-box"> <span class="price">RS.{{ $getProductPrice->price??"" }}</span></div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  New arrivals Products Slider Block End  -->
@endsection


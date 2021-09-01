<?php
use App\Http\Controllers\Controller;
$cartdata = Controller::cartdata();
?>

<style>
  #feat {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  #head{
    width: 30%;
  }
  #feat td, #feat th {
    border: 1px solid #ddd;
    padding: 12px;
  }
  
  #feat tr:nth-child(odd){background-color: #f2f2f2;}
  
  #feat tr:hover {background-color: #ddd;}
  
  }
</style>

@extends('layouts.frontLayout.front_design')
@section('content')  
  <!-- CONTAIN START -->
  <section class="pt-70">
    <input type="hidden" name="id" value="{{$productDetails->id}}">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-5 col-md-5 mb-xs-30">
              <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native"> <a href="#"><img class="mainImage" src="{{ asset('images/backend_images/product/medium/'.$productDetails->image)}}" alt="Stylexpo"></a> 
              
              @foreach ($productAltImages as $altimage)
                <a href="#"><img class="changeImage" style="width:80px;" src="{{ asset('images/backend_images/product/medium/'.$altimage->image)}}" alt="Stylexpo"></a>                   
              @endforeach
            </div>
            </div>
            <div class="col-lg-7 col-md-7">
              <div class="row">
                <div class="col-12">
                  <div class="product-detail-main">
                    <div class="product-item-details">
                      @php 
                          $getProductPrice = \App\ProductsAttribute::where("product_id","=",$productDetails->id)->first();
                      @endphp
                      <h1 class="product-item-name" style="text-transform: capitalize;">{{ $productDetails->product_name }}&nbsp;<span id="ramrom">({{$getProductPrice->color??""}},{{ $getProductPrice->ram??"" }},{{ $getProductPrice->storage??"" }})</span></h1>
                      <div>
                      <label for="code">Model Number: {{ $productDetails->model_number }}</label>
                      </div>
                          <label id="getPrice" style="color:red;font-weight:600;">RS.</label>
                      <div class="product-info-stock-sku">
                        <div>
                          <label>Availability: </label>
                          <span id="Availability" class="info-deta" style="color:#007600!important;">
                            @if($total_stock>0)
                              In stock
                            @else
                              Out Of Stock
                            @endif
                          </span> 
                        </div>
                      </div>
                      <p>{{ $productDetails->description }}</p>
                      <div class="product-color mb-10">
                        <label>Color & Variant</label>
                        @php
                            $price = "";
                        @endphp
                        <fieldset>
                          <select class="selectpicker form-control" name="color" id="select-css" onchange="catchange();catstock();catramrom();">
                            @foreach ($productDetails->attributes as $key => $colors)
                            @php
                                if($key == 0){
                                  $price = $colors->price;
                                  $stock = $colors->stock;
                                }
                            @endphp
                              <option class="option1" name="options2" value="{{$colors->id}}" style="background: #fff;
                                border-top: 2px solid #ff3030;
                                text-transform:capitalize;
                                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.25);
                                max-height: 350px;">{{ $colors->color }}, ({{$colors->ram}}, {{$colors->storage}})</option>
                            @endforeach
                          </select>
                        </fieldset>
                          <input type="hidden" id="forPrice" value="{{$price}}">
                      </div>
                      <div class="mt-3">
                        <div class="pb-10">
                          <div class="warranty mb-1">
                              <label for="">Warranty :</label> {{ $productDetails->warranty }}
                          </div>
                        </div>
                        <div class="pb-10">
                          <div class="warranty">
                            <label for="Replacement Policy">Replacement Policy :</label> 10 Days
                          </div>
                        </div>
                      </div>
                      <div class="mb-10">
                      @php
                         $count = 0; 
                      @endphp
                        @if(Auth::check() && Auth::user()->admin==0)
                          @foreach ($cartdata as $cartd)
                            @if ($cartd->attribute_id == $getProductPrice->id)
                              @php
                                $count=1;
                              @endphp
                            @endif
                          @endforeach
                        @endif
                        {{-- <script>
                          alert("flag");
                          alert(count);
                          if (flag==1)
                          {
                            $("#go_cart").hide();
                            $("#cartButton").show();
                          }
                          else{
                            $("#cartButton").hide();
                            $("#go_cart").show();
                          }
                        </script> --}}
                        <div class="bottom-detail cart-button">
                          <ul>
                            <li class="pro-cart-icon">
                              <form>
                                @if((!empty(Auth::check()) && Auth::user()->admin==0))
                                  @if($total_stock > 0)
                                    <button type="button" id="cartButton" title="Add to Cart" class="btn-color" onclick="add_to_cart();"><span></span>Add to Cart</button>
                                    <button type="button" title="Go To Cart" id="go_cart" onclick="cart();" class="btn-color"><i class="fa fa-share-square-o"></i> Go to Cart</button>
                                  @endif
                                @else
                                <button onclick="document.location='{{ url('/login-user')}}'" type="button" id="cartButton" title="Add to Cart" class="btn-color"><span></span>Add to Cart</button>
                                @endif
                              </form>
                            </li>
                          </ul>
                        </div>
                        @if ($count == 1)
                          <script>
                            document.getElementById('cartButton').hidden=false;
                            cdocument.getElementById('go_cart').hidden=false;
                          </script>                            
                        @else
                          <script>
                            document.getElementById('go_cart').hidden=false;
                            document.getElementById('cartButton').hidden=false;
                          </script> 
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="ptb-70">
    <div class="container">
        <h3 class="specification align-center mt-70">Specifications / Features</h3>
      <div class="product-detail-tab">
        <div class="row">
          <div class="col-lg-12">
            <div id="tabs">
              <ul class="nav nav-tabs">
                <li><a class="tab-General selected" title="General">General</a></li>
                <li><a class="tab-Display" title="Display">Display</a></li>
                <li><a class="tab-Processor" title="Processor">Os & Processor</a></li>
                <li><a class="tab-Storage" title="Storage">Memory & Storage</a></li>
                <li><a class="tab-camera" title="camera">Camera</a></li>
                <li><a class="tab-Connectivity" title="Connectivity">Connectivity</a></li>
                <li><a class="tab-Details" title="Details">Other Details</a></li>
                <li><a class="tab-Multimedia" title="Multimedia">Multimedia</a></li>
                <li><a class="tab-Dimensions" title="Dimensions">Dimensions</a></li>
              </ul>
            </div>
            <div id="items">
              <div class="tab_content">
                <ul>
                  <li>
                    <div class="items-General selected ">
                      <div class="General"> 
                        <table id="feat" style="border: None;">
                          <tr>
                            <td id="head">Model Name</td>
                            <td>{{ $productDetails->model_name }}</td>
                          </tr>
                          <tr>
                            <td id="head">Model Number</td>
                            <td>{{ $productDetails->model_number }}</td>
                          </tr>
                          <tr>
                            <td id="head">Browse Type</td>
                            <td>{{ $productDetails->browse_type }}</td>
                          </tr>
                          <tr>
                            <td id="head">SIM Type</td>
                            <td>{{ $productDetails->sim_type }}</td>
                          </tr>
                          <tr>
                            <td id="head">Hybrid Sim Slot</td>
                            <td>@if($productDetails->hybrid_sim_slot==0)No @else Yes @endif</td>
                          </tr>
                          <tr>
                            <td id="head">Touch Screen</td>
                            <td>@if($productDetails->touch_screen==0)No @else Yes @endif</td>
                          </tr>
                          <tr>
                            <td id="head">OTG Compatible</td>
                            <td>@if($productDetails->otg_compatible==0)No @else Yes @endif</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="items-Display">
                        <table id="feat" style="border: None;">
                          <tr>
                            <td id="head">Display Size</td>
                            <td>{{ $productDetails->display_size }}</td>
                          </tr>
                          <tr>
                            <td id="head">Resolution</td>
                            <td>{{ $productDetails->resolution }}</td>
                          </tr>
                          <tr>
                            <td id="head">Resolution Type</td>
                            <td>{{ $productDetails->resolution_type }}</td>
                          </tr>
                          <tr>
                            <td id="head"> Other Display Features</td>
                            <td>{{ $productDetails->other_display_features }}</td>
                          </tr>
                        </table>
                    </div>
                  </li>
                  <li>
                    <div class="items-Processor">
                        <table id="feat" style="border: None;">
                          <tr>
                            <td id="head">Operating System</td>
                            <td>{{ $productDetails->operating_system }}</td>
                          </tr>
                          <tr>
                            <td id="head">Processor Type</td>
                            <td>{{ $productDetails->processor_type }}</td>
                          </tr>
                          <tr>
                            <td id="head">Processor Core</td>
                            <td>{{ $productDetails->processor_core }}</td>
                          </tr>
                          <tr>
                            <td id="head">Primary Clock Spped</td>
                            <td>{{ $productDetails->primary_clock_speed }}</td>
                          </tr>
                          <tr>
                            <td id="head">Secondary Clock Speed</td>
                            <td>{{ $productDetails->secondary_clock_speed }}</td>
                          </tr>
                          <tr>
                            <td id="head">Processor Core</td>
                            <td>{{ $productDetails->operating_frequency }}</td>
                          </tr>
                        </table>
                    </div>
                  </li>
                  <li>
                    <div class="items-Storage">
                        <table id="feat" style="border: None;">
                          <tr>
                            <td id="head">Supported Memory Card Type</td>
                            <td>{{ $productDetails->supported_memory_card_type }}</td>
                          </tr>
                          <tr>
                            <td id="head">Memory Card Slot Type</td>
                            <td>{{ $productDetails->memory_card_slot_type }}</td>
                          </tr>                      
                        </table>
                    </div>
                  </li>
                  <li>
                    <div class="items-camera">
                        <table id="feat" style="border: None;">
                         <tr>
                            <td id="head">Primary Camera Available</td>
                            <td>@if($productDetails->primary_camera_available==0)No @else Yes @endif</td>
                          </tr>
                          <tr>
                            <td id="head">Primary Camera</td>
                            <td>{{ $productDetails->primary_camera }}</td>
                          </tr>
                          <tr>
                            <td id="head">Primary Camera Features</td>
                            <td>{{ $productDetails->primary_camera_features }}</td>
                          </tr>
                          <tr>
                            <td id="head">Secondary Camera</td>
                            <td>@if($productDetails->secondary_camera_available==0)No @else Yes @endif</td>
                          </tr>
                          <tr>
                            <td id="head">Secondary Camera Available</td>
                            <td>{{ $productDetails->secondary_camera }}</td>
                          </tr>
                          <tr>
                            <td id="head">Flash</td>
                            <td>{{ $productDetails->secondary_camera_features }}</td>
                          </tr>
                          <tr>
                            <td id="head">Dual Camera Lens</td>
                            <td>{{ $productDetails->flash }}</td>
                          </tr>
                        </table>
                    </div>
                  </li>
                  <li>
                    <div class="items-Connectivity">
                        <table id="feat" style="border: None;">
                         <tr>
                          <td id="head">Network Type</td>
                            <td>{{ $productDetails->network_type }}</td>
                          </tr>
                          <tr>
                            <td id="head">Supported Networks</td>
                            <td>{{ $productDetails->supported_networks }}</td>
                          </tr>
                          <tr>
                            <td id="head">Internet Connectivity</td>
                            <td>{{ $productDetails->internet_connectivity }}</td>
                          </tr>
                          <tr>
                            <td id="head">GPRS</td>
                            <td>@if($productDetails->gprs==0)No @else Yes @endif</td>
                          </tr>
                          <tr>
                            <td id="head">Pre-installed Browser</td>
                            <td>{{ $productDetails->pre_installed_browser }}</td>
                          </tr>
                          <tr>
                            <td id="head">Micro USB Port</td>
                            <td>{{ $productDetails->micro_usb_port }}</td>
                          </tr>
                          <tr>
                            <td id="head">Bluetooth Support</td>
                            <td>@if($productDetails->blutooth_support==0)No @else Yes @endif</td>
                          </tr>
                          <tr>
                            <td id="head">Bluetooth Version</td>
                            <td>{{ $productDetails->blutooth_version }}</td>
                          </tr>
                          <tr>
                            <td id="head">Wi-Fi</td>
                            <td>@if($productDetails->wifi==0)No @else Yes @endif</td>
                          </tr>
                          <tr>
                            <td id="head">Wi-Fi Version</td>
                            <td>{{ $productDetails->wifi_version }}</td>
                          </tr>
                          <tr>
                            <td id="head">USB Connectivity</td>
                            <td>@if($productDetails->usb_connectivity==0)No @else Yes @endif</td>
                          </tr>
                          <tr>
                            <td id="head">Audio Jack</td>
                            <td>{{ $productDetails->audio_jack }}</td>
                          </tr>
                        </table>
                    </div>
                  </li>
                  <li>
                    <div class="items-Details">
                        <table id="feat" style="border: None;">
                         <tr>
                          <td id="head">Touchscreen Type</td>
                            <td>{{ $productDetails->touchscreen_type }}</td>
                          </tr>
                          <tr>
                            <td id="head">SIM Size</td>
                            <td>{{ $productDetails->sim_size }}</td>
                          </tr>
                          <tr>
                            <td id="head">Sensors</td>
                            <td>{{ $productDetails->sensors }}</td>
                          </tr>
                          <tr>
                            <td id="head">Other Features</td>
                            <td>{{ $productDetails->other_features }}</td>
                          </tr>
                          <tr>
                            <td id="head">GPS Type</td>
                            <td>{{ $productDetails->gps_type }}</td>
                          </tr>
                        </table>
                    </div>
                  </li>
                  <li>
                    <div class="items-Multimedia">
                        <table id="feat" style="border: None;">
                         <tr>
                          <td id="head">FM Radio</td>
                            <td>@if($productDetails->fm_radio==0)No @else Yes @endif</td>
                          </tr>
                          <tr>
                            <td id="head">Audio Formats</td>
                            <td>{{ $productDetails->audio_format }}</td>
                          </tr>
                          <tr>
                            <td id="head">Video Formats</td>
                            <td>{{ $productDetails->video_format }}</td>
                          </tr>
                        </table>
                    </div>
                  </li>
                  <li>
                    <div class="items-Dimensions">
                        <table id="feat" style="border: None;">
                         <tr>
                            <td id="head">Width</td>
                            <td>{{ $productDetails->width }}</td>
                          </tr>
                          <tr>
                            <td id="head">Height</td>
                            <td>{{ $productDetails->height }}</td>
                          </tr>
                          <tr>
                            <td id="head">Depth</td>
                            <td>{{ $productDetails->depth }}</td>
                          </tr>
                          <tr>
                            <td id="head">Weight</td>
                            <td>{{ $productDetails->weight }}</td>
                          </tr>
                          </table>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="pb-70">
    <div class="container">
      <div class="product-listing">
        <div class="row">
          <div class="col-12">
            <div class="heading-part mb-40">
              <h2 class="main_title heading"><span>Related Products</span></h2>
            </div>
          </div>
        </div>
        <div class="pro_cat">
          <div class="row">
            <div class="owl-carousel pro-cat-slider">
              @foreach ($relatedProducts as $relatedproduct)
              <div class="item">
                <div class="product-item">
                  <div class="product-image"> <a href="{{ url('product/'.$relatedproduct->id)}}"> <img src="{{ asset('images/backend_images/product/small/'.$relatedproduct->image)}}" alt="Stylexpo"></a>
                    <div class="product-detail-inner">
                      <div class="detail-inner-left align-center">
                        <ul>
                          <li class="pro-cart-icon">
                            <button onclick="document.location='{{ url('product/'.$relatedproduct->id)}}'" title="Add to Cart"><span></span>View Details</button>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  @php 
                  $getProductPrice = \App\ProductsAttribute::where("product_id","=",$relatedproduct->id)->first();
                  @endphp
                  <div class="product-item-details">
                    <div class="product-item-name"><a href="{{ url('product/'.$relatedproduct->id)}}">{{ $relatedproduct->product_name }}&nbsp;({{$getProductPrice->color??""}},{{ $getProductPrice->ram??"" }},{{ $getProductPrice->storage??"" }})</a></div>
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
  <!-- CONTAINER END --> 
  @endsection
  <script>
    
    function add_to_cart(){
      var ramrom = $(".selectpicker").val();
      // alert(ramrom);
      $.ajax({
      type: "get",
      url: "/add-to-cart",
      data: "idColor="+ramrom,
      cache: false,
      success: function(resp)
      {
        // $("#ramrom").html(resp);
        if(resp == "success"){
          $("#cartButton").hide();
          $('#go_cart').show();
        }
      },error:function(){
        alert("Error")
      }
    });
    }

    function cart(){
      window.location.href="/shopping-cart";
    }
  </script>
<?php
use App\Http\Controllers\Controller;
$cartdata = Controller::cartdata();
?>

@extends('layouts.frontLayout.front_design')
@section('content')

  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">Checkout</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="{{url('/')}}">Home</a>/</li>
            <li><a href="{{ url('/shopping-cart') }}">Cart</a>/</li>
            <li><span>Checkout</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->
  @php
      $total = 0;
  @endphp
  @foreach ($cartdata as $cartd)
    @php
       $total = $total + ($cartd->price*$cartd->qty);
    @endphp
  @endforeach
  <section class="checkout-section ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="checkout-content">
            <div class="row">
              <div class="col-md-8 mb-sm-30">
                <div class="cart-item-table commun-table mb-30">
                  <div class="row">
                    <div class="col-sm-3" style="margin-top: 8px;">
                      <div class="heading-part">
                        <label class="sub-heading" style="font-weight: 600; font-size:16px; color:#1b2839; text-transform:uppercase;">Shipping Address</label>
                      </div>
                    </div>
                    <div class="col-lg-9" >
                      <div class="input-box select-dropdown">
                        <fieldset>
                          <select name="address" class="browser-default custom-select" id="address" onchange="change();" style="width: 600px;">
                            @foreach ($deliveryAddress as $address)
                            @php
                                $data = \App\Area::where('id','=',$address->area_id)->first();
                            @endphp
                              <option value="{{$address->id}}">{{$address->customer_name}}, {{$address->address}}, {{$address->landmark}}, {{$data->name}} - {{$data->pincode}} India</option>
                            @endforeach
                          </select>
                        </fieldset>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=" commun-table mb-25">
                  <div class="table-responsive"  id="blank" style="overflow-x: hidden">
                    <form class="main-form" method="post">{{csrf_field()}}
                      <div class="container">
                        <div class="row">
                          <div class="col-9">
                            <div class="heading-part">
                              <h3 class="sub-heading">Billing Address</h3>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-box">
                              <input type="text" required placeholder="Full Name" name="customer_name" id="customer_name" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-box">
                              <input type="email" required placeholder="Email Address" name="email" id="email" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-box">
                              <input type="text" required placeholder="Contact Number" name="contact_no" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57;" id="contact_no" required>
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="input-box select-dropdown">
                              <fieldset>
                                <select name="area" class="browser-default custom-select city" onchange="selectcity();selectstate();" id="area">
                                  <option selected="" value="" disabled="">Select Area and Pincode</option>
                                  @foreach ($areas as $area)
                                    <option value="{{$area->id}}">{{$area->name}}-{{$area->pincode}}</option>
                                 @endforeach
                                </select>
                              </fieldset>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-box">
                              <input type="text" disabled="" placeholder="Select City" id="getcity">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-box">
                              <input type="text" disabled="" placeholder="Select State" id="getstate">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="input-box">
                              <input type="text" required placeholder="Shipping Address" name="address" id="ship_address" required>
                              <span>Please provide the number and street.</span> 
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="input-box">
                              <input type="text" required placeholder="Shipping Landmark" name="landmark" id="landmark" required>
                              <span>Please include landmark (e.g : Opposite Bank) as the carrier service may find it easier to locate your address.</span> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="table-responsive"  id="default" style="overflow-x: hidden">
                  </div>
                  <div class="col-md-12">
                    <div class="check-box"> 
                      <span>
                        <input type="checkbox" name="bill_addresss" id="bill_addresss" class="checkbox" onclick="check();">
                        <label for="bill_addresss">Use my delivery address as my billing address</label>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-12"> 
                  <button class="btn btn-color right-side" onclick="submitted()">Place Order</</button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="cart-total-table address-box commun-table mb-30">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2">Cart Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Item(s) Subtotal</td>
                          <td><div class="price-box"> <span class="price">RS. {{$total}}</span> </div></td>
                        </tr>
                        <tr>
                          @if ($total>0)
                            <td>Shipping</td>
                            <td><div class="price-box"> <span class="price">Rs. 0 (Free)</span> </div></td>
                          @else
                            <td>Shipping</td>
                            <td><div class="price-box"> <span class="price">Rs. 0/-</span> </div></td> 
                          @endif
                         </tr>
                        <tr>
                          <td>Amount Payable</td>
                          <td><div class="price-box"> <span class="price">RS. {{$total}}/-</span> </div></td>
                        </tr>
                      </tbody>
                    </table>
                    <input type="text" hidden="" id="price" value="{{$total}}">
                  </div>
                </div>
                <div class="cart-total-table address-box commun-table">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Select a payment method</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <form>
                              <span>
                                <input type="radio" id="paypal" value="paypal" name="payment_type">
                              </span>
                              <b>
                              <a href="https://pmny.in/kIDJoSekpIs2">Pay Online</a></b>
                              <br>
                              <span>
                                <input type="radio" id="cash" value="cash" checked="" name="payment_type">
                              </span>
                              <label for="cash">Cash on Delivery</label>
                            </form>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

function check(){
  var id=document.getElementById('address').value;
  var check=document.getElementById('bill_addresss');
  // alert(id);
  if(check.checked==true){
    // alert("hello");
    $.ajax({
      type: "GET",
      url: '/get-address',
      data: {id:id},
      cache: false,
      success: function(response)
      {
        // alert(response);
        document.getElementById('blank').hidden=true;
        $("#default").html(response);
        document.getElementById('default').hidden=false;
      }
    });
  }
  else{
    document.getElementById('blank').hidden=false;
    document.getElementById('default').hidden=true;
  }
}
function change(){
  check();
}
function submitted(){
  var count=0;
  var check=document.getElementById('bill_addresss');
  var name=document.getElementById('customer_name').value;
  var email=document.getElementById('email').value;
  var contact=document.getElementById('contact_no').value;
  var area=document.getElementById('area').value;
  var address=document.getElementById('ship_address').value;
  var landmark=document.getElementById('landmark').value;
  var price=document.getElementById('price').value;
  var option= $("input:radio[name=payment_type]:checked").val();
  var id=document.getElementById('address').value;
  if (id>0)
  {
    if(check.checked==false)
    {
      var check=0;
      $.ajax({
          type: "GET",
          url: '/placeorder',
          data: 
          {
            id:id,
            name:name,
            email:email,
            contact:contact,
            area:area,
            address:address,
            landmark:landmark,
            price:price,
            check:check
          },
          cache: false,
          success: function(response)
          {
            window.location.href="/thank-you";
          }
        });
    }
    else
    {
      var id=document.getElementById('address').value;
      var check=1;
      $.ajax({
        type: "GET",
        url: '/placeorder',
        data: 
        {
          id:id,
          price:price,
          check:check
        },
        cache: false,
        success: function(response)
        {
          window.location.href="/thank-you";
        }
      });
    }
  }
  else
  {
    swal("", "Please Enter Shipping Address in Account");
  }
} 
</script>
@endsection
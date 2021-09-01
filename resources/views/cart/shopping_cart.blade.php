<?php
use App\Http\Controllers\Controller;
$cartcount = Controller::cartcount();
?>

@extends('layouts.frontLayout.front_design')
@section('content')

  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1" style="margin-bottom: 3em;">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">Shopping Cart</h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="index-2.html">Home</a>/</li>
            <li><span>Shopping Cart</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->
    @if($cartcount == 0)
    <div class="container" style="border: 2px solid #ff3030;display: block;margin-left: auto;margin-right: auto;margin-bottom: 3em;">
      <div class="mt-3">
        <img alt="Stylexpo" src="{{ asset('images/frontend_images/cart-empty.jpg')}}" style="    margin-left: auto;margin-right: auto;width: 32%;display: block;">
      </div>
      <div class="mb-5 mt-3">
        <a href="{{url('/')}}" class="btn-color btn" style="margin-left: auto;margin-right: auto;display: block;width: 20%;">START SHOPPING</a> 
      </div>
    </div>  
    @else
    <section class="ptb-70">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="cart-item-table commun-table">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Sub Total</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $total = 0;
                    @endphp
                    @foreach ($cartdata as $cartd)
                    @php
                      $total = $total + ($cartd->price*$cartd->qty)
                    @endphp
                    <tr>
                      <td>
                        <a href="">
                          <div class="product-image">
                            <img alt="Stylexpo" src="{{ asset('images/backend_images/product/small/'.$cartd->image)}}">
                          </div>
                        </a>
                      </td>
                      <td>
                        <div class="product-title"> 
                        <a href="">{{$cartd->product_name}} ({{$cartd->color}},{{$cartd->ram}},{{$cartd->storage}})</a> 
                        </div>
                      </td>
                      <td>
                        <ul>
                          <li>
                            <div class="base-price price-box"> 
                              <span class="price">RS. {{$cartd->price}}</span> 
                            </div>
                          </li>
                        </ul>
                      </td>
                      <td>
                        <div class="input-box select-dropdown">
                          <fieldset>
                            <select class="browser-default custom-select qty" name="qty" id="qty" onchange="quantity(this,{{$cartd->id}});">
                              @if($cartd->qty > 1)
                                <option value="{{$cartd->qty}}" hidden="">{{$cartd->qty}}</option>
                              @endif
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                          </fieldset>
                        </div>
                      </td>
                      <td>
                        <div class="total-price price-box"> 
                        <span class="price">RS. {{ $cartd->price*$cartd->qty }}</span> 
                        </div>
                      </td>
                      <td>
                        <a rel="{{$cartd->id}}" rel1="delete_cart_product" href="javascript:" style="margin-left: 5px;font-size: 16px;" class="deleteRecord"><i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i></a>
                      </td>
                    </tr>
                    {{-- @php
                        $total += $content->subtotal; 
                    @endphp --}}
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="mb-30">
          <div class="row">
            <div class="col-md-6">
              <div class="mt-30"> 
                <a href="{{'/'}}" class="btn btn-color">
                  <span><i class="fa fa-angle-left"></i></span>
                  Continue Shopping
                </a> 
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="mtb-30">
          <div class="row">
            <div class="col-md-12">
              <div class="cart-total-table commun-table">
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
                        <td>
                          <div class="price-box" style="float: right"> 
                            <span class="price">RS. {{$total}}</span> 
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Shipping</td>
                        <td>
                          @if($amount > 0)
                            <div class="price-box" style="float: right"> 
                            <span class="price">RS. 0 </span> 
                            </div>
                          @else
                            <div class="price-box" style="float: right"> 
                            <span class="price">RS. 0</span> 
                            </div>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td><b>Amount Payable</b></td>
                        <td>
                          <div class="price-box" style="float: right"> 
                            <span class="price"><b>RS. {{$total}}</b></span> 
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="mt-30">
          <div class="row">
            <div class="col-12">
             <div class="right-side float-none-xs">
                @if ($totalamount > 0)
                  <a href="{{url('/checkout')}}" class="btn btn-color">Proceed to checkout
                    <span><i class="fa fa-angle-right"></i></span>
                  </a> 
                @else
                  <a href="{{url('/checkout')}}" class="btn btn-color">Proceed to checkout
                    <span><i class="fa fa-angle-right"></i></span>
                  </a>
                @endif
             </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif
  </div>
  <!-- CONTAIN START -->
  <!-- CONTAINER END --> 
@endsection

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).on('click', '.deleteRecord', function (e) {
    var id = $(this).attr('rel');
    var deleteFunction = $(this).attr('rel1');
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
      function (isConfirm) {
        if (isConfirm) {
          swal("Deleted!", "Your imaginary file has been deleted.", "success");
          window.location.href = "/cart-delete-product/"+id;
      
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
  });

  function quantity(qty,id)
  {
    var qtyupdate = qty.options[qty.selectedIndex].innerHTML;
    // alert(qtyupdate + " " + id);
    $.ajax({
      type: "GET",
      url: "/get-quantity",
      data: {id:id,qtyupdate:qtyupdate},
      cache: false,
      success: function(response)
      {
        // alert(response);
        if(response=="one"){
          swal("Only 1 Qty Left");
          document.getElementById('qty').value=1;
        }
        else if(response=="zero")
        {
          swal("", "This Product is Out  of Stock")
          location.reload();
        }
        else if(response=="Success"){
          location.reload();
        }
      }
    });
  }

</script>
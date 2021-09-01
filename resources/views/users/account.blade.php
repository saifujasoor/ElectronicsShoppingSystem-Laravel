<style>
  .error {
    color: red;
    background-color: white;
    font-weight: 400;
    font-size: 13px;
  }

  input:focus {
    outline: none !important;
  }

  input.error {
    outline: red groove thin;
  }

  label {
    color: #666666;
    font-weight: 600;
  }
</style>
@extends('layouts.frontLayout.front_design')
@section('content')
<!-- Bread Crumb STRAT -->
<div class="banner inner-banner1 ">
  <div class="container">
    <section class="banner-detail center-xs">
      <h1 class="banner-title">Account</h1>
      <div class="bread-crumb right-side float-none-xs">
        <ul>
          <li><a href="{{ url('/') }}">Home</a>/</li>
          <li><span>Account</span></li>
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
      <div class="col-lg-3">
        <div class="account-sidebar account-tab mb-sm-30">
          <div class="dark-bg tab-title-bg">
            <div class="heading-part">
              <div class="sub-title"><span></span> My Account</div>
            </div>
          </div>
          <div class="account-tab-inner">
            <ul class="account-tab-stap">
              <li id="step1" class="active"> <a href="javascript:void(0)">My Dashboard<i class="fa fa-angle-right"></i>
                </a> </li>
              <li id="step2"> <a href="javascript:void(0)">Account Details<i class="fa fa-angle-right"></i> </a> </li>
              <li id="step4"> <a href="javascript:void(0)">Change Password<i class="fa fa-angle-right"></i> </a> </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div id="data-step1" class="account-content" data-temp="tabdata">
          <div class="row">
            <div class="col-12">
              <div class="heading-part heading-bg mb-30">
                <h2 class="heading m-0">Account Dashboard</h2>
              </div>
            </div>
          </div>
          <div class="mb-30">
            <div class="row">
              <div class="col-12">
                <div class="heading-part">
                  @if (Session::has('flash_message_error'))
                  <div class="alert alert-error alert" >
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_error') !!} </strong>
                  </div>
                  @endif
                  @if (Session::has('flash_message_success'))
                  <div class="alert alert-success alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! session('flash_message_success') !!} </strong>
                  </div>
                  @endif
                  <form action="{{ url('/account') }}" method="post" id="accountForm" name="accountForm"
                    class="main-form">{{ csrf_field()}}
                    <div class="row">
                      <div class="col-12">
                        <div class="input-box">
                          <label for="your-name">Your Name</label>
                          <input value="{{ $userDetails->name }}" type="text" id="name" name="name"
                            placeholder="Edit Your Name" required>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-box">
                          <label for="mobile-no">Mobile Number</label>
                          <input value="{{ $userDetails->mobile }}" id="mobile" name="mobile"
                            pattern="\d{3}[\-]\d{3}[\-]\d{4}" placeholder="Edit Your Mobile Number" required>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-box">
                          <label for="email">Email Address</label>
                          <input value="{{ $userDetails->email }}" id="email" id="email" name="email"
                            placeholder="Edit Your Email Address">
                        </div>
                      </div>
                      <div class="pl-3">
                        <button name="submit" id="submit" type="submit" class="btn-color right-side">Update</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="data-step2" class="account-content" data-temp="tabdata" style="display:none">
          <div class="row">
            <div class="col-12">
              <div class="heading-part heading-bg mb-30">
                <h2 class="heading m-0">Account Details</h2>
              </div>
            </div>
          </div>

          <!-- View Address Details -->
          <div class="m-0">
            <div class="row">
              @foreach ($deliveryAddress as $address)
              <div class="col-md-6 mb-20">
                <div class="cart-total-table address-box commun-table">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><b>Shipping Address {{$loop->iteration  }}</b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <ul>
                                @if($address == "NULL")
                                  <li class="inner-heading"> <b>Add Address</b> </li>
                                @else
                                <li class="inner-heading"> <b>{{ $address->customer_name }}</b> </li>
                                <li>
                                  <p>{{$address->email}}</p>
                                </li>
                                <li>
                                  <p>{{$address->contact_no}}</p>
                                </li>
                                <li>
                                  <p>{{$address->address}}</p>
                                </li>
                                <li>
                                  <p>{{$address->landmark}}</p>
                                </li>
                                @php
                                    $data = \App\Area::where('id','=',$address->area_id)->first();
                                @endphp
                                <li>
                                  <p>{{$data->name}}-{{$data->pincode}}</p>
                                </li>
                                <li>
                                  <p>India</p>
                                </li>
                                <li>
                                  @if ($address->flag == 1)
                                    <label style="margin-left: 120px;font-size: 15px;">Default</label>
                                    <a style="margin-left: 5px;font-size: 16px;" onclick="show_address_edit();edit_data({{$address->id}});">Edit</a>
                                    <a rel="{{$address->id}}" rel1="delete_address" href="javascript:" style="margin-left: 5px;font-size: 16px;" class="deleteRecord">Remove</a>
                                  @else
                                    <a style="margin-left: 200px;font-size: 16px;" onclick="show_address_edit();edit_data({{$address->id}});">Edit</a>
                                    <a rel="{{$address->id}}" rel1="delete_address" href="javascript:" style="margin-left: 5px;font-size: 16px;" class="deleteRecord">Remove</a>
                                  @endif
                                </li>
                                @endif
                              <br>
                            </ul>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>               
              @endforeach
            </div>
          </div>

          <!-- Add Address Button -->
          <div class="row">
            <div class="col-12">
              <button title="Update data" class="btn-color" style="margin-top: 10px;" onclick="show_address();"><span></span>Add Address</button>
            </div>
          </div>
          <br>
          
          <!-- Insert Address Form --> 
          <div class="m-0">
            <form class="main-form full" method="post" action="{{url('add-address')}}"  id="add_address">{{ csrf_field() }}
              {{-- <input type="hidden" name="user" value="{{$address->id}}"> --}}
              <div class="mb-20">
                <div class="row">
                  <div class="col-12 mb-20">
                    <div class="heading-part">
                      <h3 class="sub-heading" style="margin-top: 20px;">Shipping Address</h3>
                    </div>
                    <hr>
                  </div>
                  <div class="col-md-6">
                    <div class="input-box">
                      <input type="text" required placeholder="Full Name" name="customer_name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-box">
                      <input type="email" required placeholder="Email Address" name="email">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-box">
                      <input type="text" required placeholder="Contact Number" name="contact_no">
                    </div>
                  </div>  
                  <div class="col-md-6">
                    <div class="input-box select-dropdown">
                      <fieldset>
                        <select name="area_id" class="city" onchange="selectcity();selectstate();">
                          <option selected="hidden">Select Area and Pincode</option>
                          @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }} - {{$area->pincode}}</option>
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
                      <input type="text" required placeholder="Shipping Address" name="address">
                      <span>Please provide the number and street.</span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-box">
                      <input type="text" required placeholder="Shipping Landmark" name="landmark">
                      <span>Please include landmark (e.g : Opposite Bank) as the carrier service may find it easier to
                        locate your address.</span>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="left-side" style="display:flex;">
                        {{-- <input type="checkbox" name="flag" value="1" id="remember_me" class="checkbox"> --}}
                        <input type="checkbox" name="flag" id="flag" style="width: 20px;height: 20px;">
                        <label for="remember_me" style="line-height: 3;margin-left: 10px;">Select as a default</label>
                    </div>
                  </div>
                  <input type="hidden" id="hide" name="hide">
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button title="Update data" onclick="check();" class="btn-color"><span></span>Add Address</button>
                </div>
              </div>
            </form>
          </div>

          <!-- Edit Address Form -->
          <div class="m-0" id="edit_data_address">
          </div>
        </div>
        
        <div id="data-step4" class="account-content" data-temp="tabdata" style="display:none">
          <div class="row">
            <div class="col-12">
              <div class="heading-part heading-bg mb-30">
                <h2 class="heading m-0">Change Password</h2>
              </div>
            </div>
          </div>
          <form id="passwordForm" method="post" action="{{ url('update-user-pwd') }}" class="main-form full">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-12">
                <div class="input-box">
                  <label for="curr-pass">Current Password</label>
                  <input type="password" placeholder="Old Password" id="old_pass" name="old_pass">
                  <span id="chkpwd"></span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="input-box">
                  <label for="login-pass">New Password</label>
                  <input type="password" placeholder="New Password" id="login_pass" name="login_pass">
                </div>
              </div>
              <div class="col-md-12">
                <div class="input-box">
                  <label for="re-enter-pass">Confirm Password</label>
                  <input type="password" placeholder="Confirm Password" id="re_enter_pass" name="re_enter_pass">
                </div>
              </div>
              <div class="col-12">
                <button class="btn-color" type="submit" name="submit">Change Password</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- CONTAINER END -->
@endsection

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>

  function show_address(){
    $('#edit_data_address').hide();
    $('#add_address').show();
  }

  function show_address_edit(){
    $('#add_address').hide();
    $('#edit_data_address').show();
  }

  function check(){
    var a = document.getElementById('flag');
    if(a.checked == true){
      document.getElementById('hide').value = 1;
    }else{
      document.getElementById('hide').value = 0;
    }
  }

  function edit_data(id){

    // alert(id);
    $.ajax({
      type: "get",
      url: "/edit-address",
      data: "id="+id,
      cache: false,
      success: function(resp)
      {
        // alert(resp);
        $("#edit_data_address").html(resp);
        //document.getElementById('edit_data').append=response;
      }
    });
  }

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
          window.location.href = "/delete-address/"+id;
      
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
  });

</script>
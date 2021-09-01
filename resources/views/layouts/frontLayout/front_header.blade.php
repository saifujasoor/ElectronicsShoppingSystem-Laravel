<?php
use App\Http\Controllers\Controller;
$mainCategories = Controller::mainCategories();
$cartdata = Controller::cartdata();
$cartcount = Controller::cartcount();
$companies = Controller::companies();
?>

<!-- HEADER START -->
  <header class="navbar navbar-custom container-full-sm" id="header">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-6">
          </div>
          <div class="col-6">
            <div class="top-right-link right-side">
              <ul>
                <li class="login-icon content">
                  <a class="content-link">
                  <span class="content-icon"></span> 
                  <div class="content-dropdown">
                    <ul>
                      @if(!empty(Auth::check()) && Auth::user()->admin==0)
                        <li class="logout-icon"><a href="{{ url('/logout-user')}}" title="Logout"><i class="fa fa-share-square"></i> Logout</a></li>
                      @else
                        <li class="register-icon"><a href="{{ url('/register-user')}}" title="Register"><i class="fa fa-user-plus"></i> Register</a></li>
                        <li class="login-icon"><a href="{{ url('/login-user')}}" title="Login"><i class="fa fa-user"></i> Login</a></li>
                      @endif
                    </ul>
                  </div>
                </li>
                @if(!empty(Auth::check()) && Auth::user()->admin==0)
                <li class="track-icon">
                  <a href="{{url('/orders')}}" title="Track your order"><span></span> Track your order</a>
                </li>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-middle">
      <div class="container">
        <hr>
        <div class="row">
          <div class="col-xl-3 col-md-3 col-lgmd-20per">
            <div class="header-middle-left">
              <div class="navbar-header float-none-sm">
                <a class="navbar-brand page-scroll" href="{{ url("/") }}">
                  <img alt="Stylexpo" src="{{ asset('images/backend_images/logo/logo1.jpg')}}" style="height: 60px; width: 139px; margin-left: 40px;">
                </a> 
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6 col-lgmd-60per mt-2">
            <div class="header-right-part" style="padding: unset;">
              
              <div class="main-search">
                <div class="header_search_toggle desktop-view">
                  <form action="{{url('/search-products')}}" method="POST">{{csrf_field()}}
                    <div class="search-box">
                        <input class="input-text" type="text" placeholder="Search entire store here..." style="border-radius:50px;" name="product">
                        <button type="submit" class="search-btn"></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-3 col-lgmd-20per mt-2">
            <div class="right-side float-left-xs header-right-link">
              <ul>
                @if (!empty(Auth::check()) && Auth::user()->admin==0)
                  @if($cartcount == 0)
                    <li class="cart-icon"> <a href="{{url('shopping-cart')}}"><span><small class="cart-notification">0</small> </span></a>
                      <div class="cart-dropdown header-link-dropdown">
                        <div class="mt-0">
                          <img alt="Stylexpo" src="{{ asset('images/frontend_images/cart-empty.jpg')}}">
                        </div>
                        <div class="mt-20"><a href="{{url('/')}}" class="btn-color btn" style="margin-left: 17%;font-size: 13px;padding: 10px;width: 70%;">START SHOPPING</a> </div>
                      </div>
                    </li>  
                  @else
                    <li class="cart-icon"> <a href="{{url('shopping-cart')}}"><span> <small class="cart-notification">{{$cartcount}}</small> </span></a>
                      <div class="cart-dropdown header-link-dropdown">
                        <ul class="cart-list link-dropdown-list">
                          @foreach ($cartdata as $cartd)
                            <li> <a rel="{{$cartd->id}}" rel1="delete_cart_product" href="javascript:" class="close-cart deleteCart"><i title="Remove Item From Cart" class="fa fa-times-circle"></i></a>
                              <div class="media"> <a class="pull-left"> <img alt="Stylexpo" src="{{ asset('images/backend_images/product/small/'.$cartd->image)}}"></a>
                                <div class="media-body"> <span><a href="#" style="font-size:16px;">{{$cartd->product_name}}</a></span>
                                  <span style="font-size: 13px;">({{$cartd->color}},{{$cartd->ram}},{{$cartd->storage}})</span>
                                  <p class="cart-price">RS. {{$cartd->price}}</p>
                                    <div class="product-qty">
                                      <label>Qty:{{$cartd->qty}}</label>
                                    </div>
                                </div>
                              </div>
                            </li>
                          @endforeach
                        </ul>
                        <div class="mt-20"><a href="{{url('/shopping-cart')}}" class="btn-color btn right-side">Cart</a> </div>
                      </div>
                    </li>
                  @endif
                @else
                    <li class="cart-icon"> <a href="{{url('shopping-cart')}}"><span><small class="cart-notification">0</small> </span></a>
                      <div class="cart-dropdown header-link-dropdown">
                        <div class="mt-0">
                          <img alt="Stylexpo" src="{{ asset('images/frontend_images/please-login.jpg')}}" style="width: 80%;margin-left: 10%;">
                        </div>
                        <div class="mt-20"><a href="{{url('/login-user')}}" class="btn-color btn" style="margin-left:13%; width:73%; padding: 13px; font-size:15px;">PLEASE LOGIN !!</a> </div>
                      </div>
                    </li>
                @endif
                <li class="side-toggle">
                  <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><i class="fa fa-bars"></i></button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom"> 
      <div class="container">
        <div class="row position-r">
          <div class="col-xl-2 col-lg-3 col-lgmd-20per position-s">
            <div class="sidebar-menu-dropdown home">
              <a class="btn-sidebar-menu-dropdown"><span></span> Categories </a>
              <div id="cat" class="cat-dropdown">
                <div class="sidebar-contant">
                  <div id="menu" class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav ">
                      @foreach ($mainCategories as $cat)
                      @if($cat->status=="1")
                      <li class="level sub-megamenu">
                        <span class="opener plus"></span>
                        <a href="{{ '/products/'.$cat->url }}" class="page-scroll">■ &nbsp;{{ $cat->name }}&nbsp;({{$cat->categories->count()}})</a>
                        <div class="megamenu mobile-sub-menu">
                          <div class="megamenu-inner-top">
                            <ul class="sub-menu-level1">
                              <li class="level2">
                                <ul class="sub-menu-level2 ">
                                  @foreach($cat->categories as $subcat)
                                  @if ($subcat->status=="1")
                                      <li class="level3"><a href="{{ url('/products/'.$subcat->url)}}"><span>■</span>{{$subcat->name}}</a>
                                  </li>
                                  @endif
                                  @endforeach
                                </ul>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </li>
                      @endif
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-lgmd-60per">
            <div class="bottom-inner">
              <div class="position-r">          
                <div class="nav_sec position-r">
                  <div class="mobilemenu-title mobilemenu">
                    <span>Menu</span>
                    <i class="fa fa-bars pull-right"></i>
                  </div>
                  <div class="mobilemenu-content">
                    <ul class="nav navbar-nav" id="menu-main">
                      <li class="active">
                        <a href="{{url('/')}}"><span>Home</span></a>
                      </li>
                      <li>
                        <a href="{{ url('/about') }}"><span>About Us</span></a>
                      </li>
                      <li>
                        <a href="{{ url('/contact') }}"><span>Contact Us</span></a>
                      </li>
                      
                      @if(!empty(Auth::check()) && Auth::user()->admin==0)
                      <li>
                        <a href="{{ url('/account') }}"><span>My Account</span></a>
                      </li>
                      <li>
                        <a href="{{ url('/orders') }}"><span>My Orders</span></a>
                      </li>
                      <li>
                        <a href="{{ url('/logout-user')}}"><span>Logout</span></a>
                      </li>
                      @else
                      <li>
                        <a href="{{ url('/login-user')}}"><span>Login/Sign up</span></a>
                      </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-3 col-lgmd-20per">
            <div class="right-side float-left-xs header-right-link">
            <div class="right-side">
              @foreach ($companies as $comp)
              <div class="help-num" >Need Help? : {{$comp->mobile}}</div>
              @endforeach
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="popup-links ">
      <div class="popup-links-inner">
        <ul>
          <li class="categories">
            <a class="popup-with-form" href="#categories_popup"><span class="icon"></span><span class="icon-text">Categories</span></a>
          </li>
          @if (!empty(Auth::check()) && Auth::user()->admin==0)
          <li class="cart-icon">
            <a class="popup-with-form" href="#cart_popup"><span class="icon"></span><span class="icon-text">Cart</span></a>
          </li>  
          @endif
          <li class="account">
            <a class="popup-with-form" href="#account_popup"><span class="icon"></span><span class="icon-text">Account</span></a>
          </li>
          <li class="scroll scrollup">
            <a href="#"><span class="icon"></span><span class="icon-text">Scroll-top</span></a>
          </li>
        </ul>
      </div>
      <div id="popup_containt">
        <div id="categories_popup" class="white-popup-block popup-position mfp-hide">
          <div class="popup-title">
            <h2 class="main_title heading"><span>categories</span></h2>
          </div>
          <div class="popup-detail">
            <ul class="cate-inner">
              @foreach ($mainCategories as $cat)
              @if($cat->status=="1")
              <li class="level sub-megamenu">
                <span class="opener plus"></span>
                <a href="{{ '/products/'.$cat->url }}" class="page-scroll"><i class="fa fa-tablet"></i>{{ $cat->name }} ({{$cat->categories->count()}})</a>
                <div class="megamenu  mega-sub-menu">
                  <div class="megamenu-inner-top">
                    <ul class="sub-menu-level1">
                      <li class="level2">
                        <ul class="sub-menu-level2 ">
                          @foreach($cat->categories as $subcat)
                              @if ($subcat->status=="1")
                                <li class="level3"><a href="{{ url('/products/'.$subcat->url)}}"><span>■</span>{{$subcat->name}}</a>
                                </li>
                              @endif
                          @endforeach
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              @endif
              @endforeach
            </ul>
          </div>  
        </div>
        @if (!empty(Auth::check()) && Auth::user()->admin==0)
        <div id="account_popup" class="white-popup-block mfp-hide popup-position">
          <div class="popup-title">
            <h2 class="main_title heading"><span>Account</span></h2>
          </div>
          <div class="popup-detail">
            <div class="row">
              <div class="col-lg-6">
                <a href="{{'/logout-user'}}">
                  <div class="account-inner">
                    <i class="fa fa-share-square"></i><br>
                    <span>Log out</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-6">
                <a href="{{ url('/account') }}">
                  <div class="account-inner mb-30">
                    <i class="fa fa-user"></i><br>
                    <span>Account</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="cart_popup" class="white-popup-block mfp-hide popup-position">
          <div class="popup-title">
            <h2 class="main_title heading"><span>cart</span></h2>
          </div>
          <div class="popup-detail">
            <div class="cart-dropdown ">
              <ul class="cart-list link-dropdown-list">
                @foreach ($cartdata as $cartd)
                  <li> <a rel="{{$cartd->id}}" rel1="delete_cart_product" href="javascript:" class="close-cart deleteCart"><i title="Remove Item From Cart" class="fa fa-times-circle"></i></a>
                  <div class="media"><a class="pull-left"><img alt="Stylexpo" src="{{ asset('images/backend_images/product/small/'.$cartd->image)}}"></a>
                    <div class="media-body"> <span style="font-size:16px;"><a href="#">{{$cartd->product_name}}</span>&nbsp;<span style="font-size:14px;">({{$cartd->color}},{{$cartd->ram}},{{$cartd->storage}})</span></a></span>
                      <p class="cart-price">RS. {{$cartd->price}}</p>
                      <div class="product-qty">
                        <label>Qty: {{$cartd->qty}}</label>
                      </div>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
              @if($cartcount == 0)
                <div class="mt-0">
                  <img alt="Stylexpo" src="{{ asset('images/frontend_images/cart-empty.jpg')}}" style="width: 70%;margin-left: 17%;">
                </div>
                <div class="mt-10"><a href="{{url('/')}}" class="btn-color btn" style="margin-left:32%; width:40%;">START SHOPPING</a> </div>
              @else
                <div class="mt-20"><a href="{{url('/shopping-cart')}}" class="btn-color btn right-side">Cart</a> </div>
              @endif
            </div>
          </div>
        </div>
        @else
        <div id="account_popup" class="white-popup-block mfp-hide popup-position">
          <div class="popup-title">
            <h2 class="main_title heading"><span>Account</span></h2>
          </div>
          <div class="popup-detail">
            <div class="row">
              <div class="col-lg-6">
                <a href="{{ url('/register-user')}}" >
                  <div class="account-inner mb-30">
                    <i class="fa fa-user-plus"></i><br>
                    <span>Register</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-6">
                <a href="{{url('/')}}">
                  <div class="account-inner mb-30">
                    <i class="fa fa-shopping-bag"></i><br>
                    <span>Shopping</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </header>
  <!-- HEADER END -->  

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <script>
    $(document).on('click', '.deleteCart', function (e) {
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
  </script>
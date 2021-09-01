<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from aaryaweb.info/html/stylexpo/stx001/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jul 2020 05:29:55 GMT -->
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta charset="utf-8">
<title>A to Z Electronics</title>
<!-- SEO Meta
  ================================================== -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="distribution" content="global">
<meta name="revisit-after" content="2 Days">
<meta name="robots" content="ALL">
<meta name="rating" content="8 YEARS">
<meta name="Language" content="en-us">
<meta name="GOOGLEBOT" content="NOARCHIVE">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS
  ================================================== -->
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend_css/font-awesome.min.css') }}"/> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend_css/bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend_css/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend_css/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend_css/fotorama.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend_css/magnific-popup.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend_css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend_css/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend_css/easyzoom.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend_css/passtrength.css') }}">
<link rel="shortcut icon" href="{{ asset('images/frontend_images/favicon.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/frontend_images/apple-touch-icon.html') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/frontend_images/apple-touch-icon-72x72.html')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/frontend_images/apple-touch-icon-114x114.html')}}">
</head>
<body class="homepage">
<div class="se-pre-con"></div>
<div id="newslater-popup" class="mfp-hide white-popup-block open align-center">
  <div class="nl-popup-main">
    <div class="nl-popup-inner">
      <div class="newsletter-inner">
        <span>Sign up & get 10% off</span>
        <h2 class="main_title">Subscribe Emails</h2>
        <form>
          <input type="email" placeholder="Email Here...">
          <button class="btn-black" title="Subscribe">Subscribe</button>
        </form>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
      </div>
    </div>
  </div>
</div>
<div class="main">
  
    @include('layouts.frontLayout.front_header')

    @yield('content')

    @include('layouts.frontLayout.front_footer')    

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/frontend_js/jquery-1.12.3.min.js') }}"></script> 
<script src="{{ asset('js/frontend_js/tether.min.js') }}"></script>
<script src="{{ asset('js/frontend_js/bootstrap.min.js') }}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="{{ asset('js/frontend_js/jquery.validate.js') }}"></script>  
<script src="{{ asset('js/frontend_js/jquery.downCount.js') }}"></script>
<script src="{{ asset('js/frontend_js/jquery-ui.min.js') }}"></script> 
<script src="{{ asset('js/frontend_js/fotorama.js') }}"></script>
<script src="{{ asset('js/frontend_js/easyzoom.js') }}"></script>
<script src="{{ asset('js/frontend_js/passtrength.js') }}"></script>
<script src="{{ asset('js/frontend_js/jquery.magnific-popup.js') }}"></script> 
<script src="{{ asset('js/frontend_js/owl.carousel.min.js') }}"></script>  
<script src="{{ asset('js/frontend_js/custom.js') }}"></script>

</body>
</html>

<script>
  $(document).ready(function(){
      $("#add_address").hide();
      $('#edit_data_address').hide();
      $('#go_cart').hide();
      $('.alert-block').hide();
  });

  function selectcity(){
      var id = $(".city").val();
      // alert(id);
      $.ajax({
        type: "get",
        url: "/get-address-city",
        data: "idCity="+id,
        cache: false,
        success: function(resp)
        {
          // alert(resp);
          $("#getcity").val(resp);
        },error:function(){
        alert("Error")
      }
      });
    }
    function selectstate(){
      var id = $(".city").val();
      // alert(id);
      $.ajax({
        type: "get",
        url: "/get-address-state",
        data: "idState="+id,
        cache: false,
        success: function(resp)
        {
          // alert(resp);
          $("#getstate").val(resp);
        },error:function(){
        alert("Error")
      }
      });
    }
    
</script>

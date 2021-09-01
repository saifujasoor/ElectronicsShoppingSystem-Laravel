@extends('layouts.frontLayout.front_design') 
@section('content')

<!-- CONTAIN START ptb-95-->
  <section class="ptb-70 gray-bg error-block-main">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="error-block-detail error-block-bg">
            <div class="row">
              <div class="col-xl-5 col-lg-6"></div>
              <div class="col-xl-7 col-lg-6">
                <div class="main-error-text">404</div>
                <div class="error-small-text">We are Sorry</div>
                <div class="error-slogan">The page you Are Looking for does not Exist</div>
                <ul class="social-icon mb-20">
                  <li><a href="#" title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                  <li><a href="#" title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                  <li><a href="#" title="Linkedin" class="linkedin"><i class="fa fa-linkedin"> </i></a></li>
                  <li><a href="#" title="RSS" class="rss"><i class="fa fa-rss"> </i></a></li>
                  <li><a href="#" title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                </ul>
                <div class="middle-580">
                  <p>Oh, would I could describe these conceptions, could impress upon paper all that is living so full and warm within me, that it might be the mirror of my soul, as my soul is the mirror of the infinite God!</p>
                </div>
                <div class="mt-40"> <a href="{{url('/')}}" class="btn btn-color">Back to Home</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 

@endsection
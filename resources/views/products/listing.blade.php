@extends('layouts.frontLayout.front_design')
@section('content')
<style>
  .edit{
    font-weight: 600;
    text-transform: initial;
    font-size: 37px;
    border: 2px dashed #ff3030;
    padding: 10px;
  }
  .pagination > li > a,
    .pagination > li > span {
        color: #ff3030; // use your own color here
}

    .pagination > .active > a,
    .pagination > .active > a:focus,
    .pagination > .active > a:hover,
    .pagination > .active > span,
    .pagination > .active > span:focus,
    .pagination > .active > span:hover{
        background-color: #ff3030;
        border-color: #ff3030;
}
.page-item.active .page-link {
    z-index: 2;
    color: #fff;
    background-color: #ff3030;
    border-color: #ff3030;
}
</style>
<!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title">
          @if(!empty($search_product))
            {{ $search_product }} 
          @else
            {{ $categoryDetails->name }} Products
          @endif
        </h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="{{ url('/') }}">Home</a>/</li>
            <li><span>
              @if(!empty($search_product))
                {{ $search_product }}
              @else
                {{ $categoryDetails->name }} Products
              @endif
            </span></li>
          </ul>
        </div>        
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->  
  
  <!-- CONTAIN START -->
  <section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-lg-11 col-lgmd-100per"> 
          <div class="shorting mb-30">
            <div class="row">
              <div class="col-lg-12">
                <div class="col-12 mb-20">
                  <div class="heading-part heading-bg">
                    <h2 class="heading text-center text-capitalize" style="border:1px solid black;">
                      @if(!empty($search_product))
                        {{ $search_product }}  
                      @else
                        {{ $categoryDetails->name }} Products
                      @endif
                    </h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="product-listing">
            <div class="inner-listing">
              <div class="row">
                @foreach ($productsAll as $pro)
                <div class="col-md-3 col-6 item-width mb-30">
                  <div class="product-item">
                      <div class="product-image"> <a href="{{ url('product/'.$pro->id) }}"> <img src="{{asset('/images/backend_images/product/small/'.$pro->image)}}" alt="Stylexpo"> </a>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left align-center">
                            <ul>
                              <li class="pro-cart-icon">
                                  <button onclick="document.location='{{ url('product/'.$pro->id)}}'" title="Add to Cart">
                                  <span></span>View Details
                                  </button>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    <div class="product-item-details">
                      @php 
                            $getProductPrice = \App\ProductsAttribute::where("product_id","=",$pro->id)->first();
                      @endphp
                      <div class="product-item-name"> <a href="{{ url('product/'.$pro->id)}}">{{ $pro->product_name }}&nbsp;({{$getProductPrice->color??""}},{{ $getProductPrice->ram??"" }},{{ $getProductPrice->storage??"" }})</a> </div>
                      <div class="price-box"> <span class="price">RS.{{ $getProductPrice->price??"" }}</span></div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <div style="margin: auto;margin-left: 50%;margin-right: 50%;">{{ $productsAll->links() }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  @endsection

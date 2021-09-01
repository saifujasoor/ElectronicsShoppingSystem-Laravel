@extends('layouts.frontLayout.front_design')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<div class="container">
<style>
.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}
.card .fa-download{
    font-size: 30px;
    margin-left: 10px;
    color: #ee5435;
    border: 2px solid #ee5435;
    padding: 4.5px;
    margin-top: 4px;
    border-radius: 7px;
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
.card .fa, .fas {
    margin-top: 13px;
}
.card hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.card-body{
    flex: 1 1 auto;
    padding: 1.25rem;
}

.card-body{
    flex: 1 1 auto;
    padding: 1.25rem;
}

ul.row, ul.row-sm {
    list-style: none;
    padding: 0;
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #FF5722
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #ee5435;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}

ul.row,
ul.row-sm {
    list-style: none;
    padding: 0
}

.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}
</style>
    <article class="card my-5">
        <header class="card-header" style="color:black; font-weight:600; font-size:17px;"> My Orders / Tracking </header>
        
        @foreach ($orderdata->unique('flag') as $orders)
        <div class="card-body" style="border-bottom: 1px solid #ddd;">
            <h6>Order ID: {{$orders->flag}}</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Order Date & Time:</strong> <br>{{$orders->created_at}} </div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"> <strong>Total Amount:</strong> <br> RS. {{$orders->amount}} </div>
                </div>
            </article>
            <div class="track">
                @if($orders->cancel_flag == 0)
                    @if($orders->order_status == "Order Placed")
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Shipped</span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>
                    @elseif($orders->order_status == "Order Shipped")
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Shipped</span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>
                    @elseif($orders->order_status == "On the way")
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Shipped</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>
                    @elseif($orders->order_status == "Order Delivered")
                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Shipped</span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                        <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>
                    @endif    
                @else
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Cancelled</span> </div>
                @endif
            </div>
            <hr>
            @php
                $user_id = Auth::user()->id;
                $orderDetails = \DB::table('orders')
                ->join('products_attributes','orders.pro_attribute_id', '=', 'products_attributes.id')
                ->join('products','products_attributes.product_id', '=', 'products.id')
                ->select('products_attributes.ram','products_attributes.storage','products_attributes.color','products_attributes.price','orders.*','products.product_name','products.image')
                // ->groupBy(\DB::raw('orders.flag'))
                ->where(['user_id'=>$user_id])
                ->where(['flag'=>$orders->flag])
                ->orderBy('orders.created_at', 'desc')
                ->get();

                $salesreturn = \DB::table('sales_returns')
                    ->join('sales','sales_returns.sales_id', '=', 'sales.id')
                    ->select('sales.*','sales_returns.*')
                    ->where(['user_id'=>$user_id])
                    ->get();
            @endphp
            <ul class="row">
                @foreach ($orderDetails as $order)
                @php
                    $count = 0;    
                @endphp
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside" style="border:1px solid #ddd;"><img src="{{ asset('images/backend_images/product/small/'.$order->image)}}" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">{{$order->product_name}} ({{$order->color}},{{$order->ram}},{{$order->storage}})<br>Qty: {{$order->qty}}</p> <span class="text-muted">RS. {{$order->price*$order->qty}} </span>
                        </figcaption>
                    </figure>
                    @if($order->cancel_flag == 0 && $order->order_status == "Order Delivered")
                        @foreach ($salesreturn as $sales)
                            @if($sales->order_id == $order->id && $sales->pro_attribute_id == $order->pro_attribute_id)
                                @php
                                    $count=1;
                                @endphp
                            @endif
                        @endforeach
                        @if($count == 0)
                            <div class="mt-20"><button type="button" onclick="return_product({{$order->id}})" class="btn-color btn left-side" data-toggle="modal" style="border-radius: 8px; background: #ee5435;">Return Order</button></div>
                        @else
                            <h6 style="color:#ee5435;"><span class="icon mr-2"> <i class="fa fa-check" style="border:1px solid #ee5435"></i> </span> <span class="text"> This product has been returned</span></h6>
                        @endif
                    @endif
                </li>
                @endforeach
            </ul>
            <hr>
            @if ($orders->cancel_flag == 0 && $orders->order_status == "Order Placed" ||$orders->order_status == "Order Shipped" || $orders->order_status == "On the way")
                <div class="mt-20"><a rel="{{$orders->id}}" rel1="delete-orders" class="btn-color btn left-side deleteOrder" style="border-radius: 8px; background: #ee5435;">Cancel Order</a></div>
            @endif
            @if($orders->cancel_flag == 0 && $orders->order_status == "Order Placed" || $orders->order_status == "Order Shipped" || $orders->order_status == "On the way" || $orders->order_status == "Order Delivered")
                <div class="right-side"><a href="{{ url('/download-pdf-invoice/'.$orders->id) }}"  data-toggle="tooltip" title="download"><i class="fas fa-download"></i></a></div>
                <div class="mt-20"><a href="{{ url('/view-pdf-invoice/'.$orders->id) }}" target="_blank" class="btn-color btn right-side" style="border-radius: 8px; background: #ee5435;">Invoice</a> </div>
            @endif
        </div>
        @endforeach
    </article>
    <div class="my-4" style="margin: auto;margin-left: 50%;margin-right: 50%;">{{ $orderdata->links() }}</div>
  </div>
@endsection

<div class="modal fade" id="reason" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Why are you returning this?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <textarea class="form-control" id="reasons" name="reasons" style="height: 80px;"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 8px; background: #a5a5a5; color:black;">Close</button>
          <button type="button" class="btn-color btn right-side" style="border-radius: 8px; background: #ee5435;" onclick="order_return();">Return Order</button>
        </div>
      </div>
    </div>
  </div>
  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    var aid;
    function return_product(id){
        // alert(id);
        aid=id;
        $('#reason').modal("show");
    }

    function order_return(){
        // alert(aid);
        reason=document.getElementById("reasons").value;
        if(document.getElementById("reasons").value==0)
        {
        swal("", "Please Enter Reason")
        }
        else{
            $.ajax({
            type: "GET",
            url:"/order-return",
            data:{id:aid,reason:reason},
            success: function(data){
                if(data=="Success")
                {
                location.reload();
                }
            }
          }); 
        }
    }

    $(document).on('click', '.deleteOrder', function (e) {
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
          swal("Cancelled!", "Your Order has been Cancelled.", "success");
          $.ajax({
            type: "GET",
            url:"/cancel-Orders",
            data:{id:id},
            success: function(data){
              if(data=="Success")
              {
                location.reload();
                //document.getElementById('cancled').disabled=true;
              }
            }
          });
      
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
  })

</script>
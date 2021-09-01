@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a>Cancel Orders</a> <a class="current">Cancel Orders</a> </div>
      <h1>Cancel Orders</h1>
        @if (Session::has('flash_message_error')) 
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!! session('flash_message_error') !!}  </strong>
        </div>         
        @endif  
        @if (Session::has('flash_message_success')) 
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{!! session('flash_message_success') !!}  </strong>
        </div>         
        @endif    
    </div>
    <div class="container-fluid">
      <hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Cancel Orders</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($orderdata as $order)
                    <tr class="gradeX">
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->contact_no }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>Order Cancelled</td>
                        <td class="center">
                          <a href="#exampleModal{{ $order->id }}" data-toggle="modal" class="btn btn-success btn-mini" title="View Order Details">View</a>
                    </tr>  
                @endforeach      
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @foreach ($orderdata as $order)
  <div id="exampleModal{{ $order->id }}" aria-hidden="true" class="modal fade">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <table>
              <thead>
                <tr>
                  <th style="font-size: 14px;">Product</th>
                  <th style="font-size: 14px;">Product Name</th>
                  <th style="font-size: 14px;">Quantity</th>
                  <th style="font-size: 14px;">Total</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                <td style="width:200px;">
                  <img src="{{ asset('images/backend_images/product/medium/'.$order->image)}}" style="width: 100px;height: 100px;">
                </td>
    
                <td style="width:400px;">
                  <label style="font-size: 14px;text-align:center;">{{$order->product_name}} ({{$order->ram}},{{$order->storage}})
                    </label> 
                </td>
                <td style="width:100px;">
                  <label style="font-size: 14px; text-align:center;">{{$order->qty}}</label>
                </td>
                <td style="width:100px;">
                  <label style="font-size: 14px;text-align:center;">{{$order->price* $order->qty}}</label>
                </td>
              </tr>
            </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection
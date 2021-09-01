@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a>View Return Orders</a> <a class="current">View Return Orders</a> </div>
      <h1>View Return Orders</h1>
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
              <h5>View Return Orders</h5>
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
                    <th>Reason</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($salesreturn as $sales)
                    <tr class="gradeX">
                        <td>{{ $sales->customer_name }}</td>
                        <td>{{ $sales->address }}</td>
                        <td>{{ $sales->contact_no }}</td>
                        <td>{{ $sales->email }}</td>
                        <td>{{ $sales->created_at }}</td>
                        <td>{{ $sales->reason }}</td>
                        <td class="center">
                          <a href="#exampleModal{{ $sales->id }}" data-toggle="modal" class="btn btn-success btn-mini" title="View Order Details">View</a>
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
  @foreach ($salesreturn as $sales)
  <div id="exampleModal{{ $sales->id }}" aria-hidden="true" class="modal fade">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Return Order Details</h5>
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
                  <img src="{{ asset('images/backend_images/product/medium/'.$sales->image)}}" style="width: 100px;height: 100px;">
                </td>
    
                <td style="width:400px;">
                  <label style="font-size: 14px;text-align:center;">{{$sales->product_name}} ({{$sales->ram}},{{$sales->storage}})
                    </label> 
                </td>
                <td style="width:100px;">
                  <label style="font-size: 14px; text-align:center;">{{$sales->qty}}</label>
                </td>
                <td style="width:100px;">
                  <label style="font-size: 14px;text-align:center;">{{$sales->price* $sales->qty}}</label>
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
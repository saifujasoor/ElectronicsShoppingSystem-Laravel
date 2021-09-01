@extends('layouts.adminLayout.admin_design')
@section('content')
<body>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{% url 'Dashboard' %}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Edit Order Status</a> </div>
    <h1>Order Status</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box" id="orders_from">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Edit Order Status</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/edit-order-status/'.$statusDetails->id) }}" name="edit_order_status" id="edit_order_status" novalidate="novalidate">{{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Select Order Status</label>
                <div class="controls">
                  <select name="order_status" id="order_status" style="width:220px;">
                    @if($statusDetails->order_status == "Order Placed")
                        <option value="Order Placed">Order Placed</option>
                        <option value="Order Shipped">Order Shipped</option>
                        <option value="On the way">On the way </option>
                        <option value="Order Delivered">Order Delivered</option>
                    @elseif($statusDetails->order_status == "Order Shipped")
                        <option value="Order Placed" disabled>Order Placed</option>
                        <option value="Order Shipped">Order Shipped</option>
                        <option value="On the way ">On the way </option>
                        <option value="Order Delivered">Order Delivered</option>
                    @elseif($statusDetails->order_status == "On the way")
                        <option value="Order Placed" disabled>Order Placed</option>
                        <option value="Order Shipped" disabled>Order Shipped</option>
                        <option value="On the way">On the way </option>
                        <option value="Order Delivered">Order Delivered</option>
                    @else
                        <option value="Order Placed" disabled>Order Placed</option>
                        <option value="Order Shipped" disabled>Order Shipped</option>
                        <option value="Out Of Delivery" disabled>Out Of Delivery</option>
                        <option value="Order Delivered">Delivered</option>
                    @endif  
                  </select>
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Update Order Status" class="btn btn-success">
              </div>

            </form>
          </div>
        </div>
     </div>
    </div>
  </div>
</div>
@endsection
@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a>Company</a> <a class="current">Add Company</a> </div>
      <h1>Add Company</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add Company</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('/admin/add-company')}}" name="add_company" id="add_company" novalidate="novalidate"> {{ csrf_field() }}
                <div class="control-group">
                  <label class="control-label">Company Name</label>
                  <div class="controls">
                    <input type="text" name="name" id="name" placeholder="Company Name">
                  </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Address</label>
                    <div class="controls">
                    <textarea name="address" id="address" cols="30" rows="3" placeholder="Address"></textarea>
                    </div>
                  </div>
                <div class="control-group">
                  <label class="control-label">Mobile</label>
                  <div class="controls">
                    <input type="text" name="mobile" id="mobile" placeholder="Mobile">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Email</label>
                  <div class="controls">
                    <input type="email" name="email" id="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Add Category" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
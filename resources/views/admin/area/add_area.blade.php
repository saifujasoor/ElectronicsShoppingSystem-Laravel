@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a>Area</a> <a class="current">Add Area</a> </div>
      <h1>Add Area</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add Area</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('/admin/add-area')}}" name="add_area" id="add_area" novalidate="novalidate"> {{ csrf_field() }}
                <div class="control-group">
                  <label class="control-label">Area Name</label>
                  <div class="controls">
                    <input type="text" name="name" id="name" placeholder="Area Name" >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Pincode</label>
                  <div class="controls">
                    <input type="text" name="pincode" id="pincode" placeholder="Area Pincode" >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">City Name</label>
                  <div class="controls">
                    <select name="city_id" style="width:220px;">
                      <option hidden="">Select city</option>
                      @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Add Area" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
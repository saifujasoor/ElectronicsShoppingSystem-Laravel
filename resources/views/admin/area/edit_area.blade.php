@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a>Area</a> <a class="current">Edit Area</a> </div>
      <h1>Edit Area</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Edit Area</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('/admin/edit-area/'.$areaDetails->id) }}" name="edit_area" id="edit_area" novalidate="novalidate">{{ csrf_field() }}
                <div class="control-group">
                  <label class="control-label">Area Name</label>
                  <div class="controls">
                    <input type="text" name="name" id="name" value="{{ $areaDetails->name }}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Area Pincode</label>
                  <div class="controls">
                    <input type="text" name="pincode" id="pincode" value="{{ $areaDetails->pincode }}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">City Name</label>
                  <div class="controls">
                    <select name="city_id" style="width: 220px;">
                      @foreach ($citylevels as $val)
                          <option value="{{ $val->id }}" @if ($val->id == $areaDetails->city_id) selected @endif>{{ $val->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Edit Area" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
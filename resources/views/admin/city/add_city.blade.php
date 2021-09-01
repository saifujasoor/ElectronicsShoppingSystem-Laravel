@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a>City</a> <a class="current">Add City</a> </div>
      <h1>Add City</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add City</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('/admin/add-city')}}" name="add_city" id="add_city" novalidate="novalidate"> {{ csrf_field() }}
                <div class="control-group">
                  <label class="control-label">City Name</label>
                  <div class="controls">
                    <input type="text" name="name" id="name" placeholder="City Name" >
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Select State</label>
                  <div class="controls">
                    <select name="state_id" style="width:220px;">
                      <option hidden="">Select State</option>
                      @foreach ($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Add State" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
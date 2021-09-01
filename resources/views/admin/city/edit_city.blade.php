@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a>City</a> <a class="current">Edit City</a> </div>
      <h1>Edit City</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Edit city</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('/admin/edit-city/'.$cityDetails->id) }}" name="edit_city" id="edit_city" novalidate="novalidate">{{ csrf_field() }}
                <div class="control-group">
                  <label class="control-label">City Name</label>
                  <div class="controls">
                    <input type="text" name="name" id="name" value="{{ $cityDetails->name }}">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">State Name</label>
                  <div class="controls">
                    <select name="state_id" style="width: 220px;">
                      @foreach ($statelevels as $val)
                        @if($val->id == $cityDetails->state_id)
                          <option value="{{ $val->id }}" selected>{{ $val->name }}</option>
                        @else
                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Edit State" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
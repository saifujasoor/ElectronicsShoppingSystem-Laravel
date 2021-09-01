@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a>State</a> <a class="current">Edit State</a> </div>
      <h1>Edit State</h1>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Edit State</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ url('/admin/edit-state/'.$stateDetails->id) }}" name="edit_state" id="edit_state" novalidate="novalidate">{{ csrf_field() }}
                <div class="control-group">
                  <label class="control-label">State Name</label>
                  <div class="controls">
                    <input type="text" name="name" id="name" value="{{ $stateDetails->name }}">
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
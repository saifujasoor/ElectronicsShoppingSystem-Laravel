@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a>Area</a> <a class="current">View Area</a> </div>
      <h1>View Area</h1>
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
              <h5>View Area</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Area ID</th>
                    <th>Area Name</th>
                    <th>Area Pincode</th>
                    <th>City Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($areas as $area)
                    <tr class="gradeX">
                        <td>{{ $area->id }}</td>
                        <td>{{ $area->name }}</td>
                        <td>{{ $area->pincode }}</td>
                        <td>{{ $area->city_name }}</td>
                        <td class="center">
                          <a href="{{ url('/admin/edit-area/'.$area->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                          <a rel="{{$area->id}}" rel1="delete-area" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                        </td>
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
@endsection
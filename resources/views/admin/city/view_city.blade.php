@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a>State</a> <a class="current">View State</a> </div>
      <h1>View State</h1>
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
              <h5>View State</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>City ID</th>
                    <th>City Name</th>
                    <th>State Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($cities as $city)
                    <tr class="gradeX">
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->state_name }}</td>
                        <td class="center">
                          <a href="{{ url('/admin/edit-city/'.$city->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                        <a rel="{{$city->id}}" rel1="delete-city" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a></td>
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
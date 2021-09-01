@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a>Company</a> <a class="current">View Company</a> </div>
      <h1>View Company</h1>
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
              <h5>View Company</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Company ID</th>
                    <th>Company Name</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($companies as $comp)
                    <tr class="gradeX">
                        <td>{{ $comp->id }}</td>
                        <td>{{ $comp->name }}</td>
                        <td>{{ $comp->address }}</td>
                        <td>{{ $comp->mobile }}</td>
                        <td>{{ $comp->email }}</td>
                        <td class="center">
                          <a href="{{ url('/admin/edit-company/'.$comp->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                        <a rel="{{$comp->id}}" rel1="delete-company" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a></td>
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
@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a>Add Products Images</a> <a class="current">Add Product Images</a> </div>
    <h1>Add Products Images</h1>
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
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Product Images</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-images/'.$productDetails->id) }}" name="add_image" id="add_image">{{ csrf_field() }}
                <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                <div class="control-group">
                    <label class="control-label">Product Name</label>
                    <label class="control-label"><strong>{{ $productDetails->product_name }}</strong></label>
                </div>
                <div class="control-group">
                  <label class="control-label">Model Number</label>
                  <label class="control-label"><strong>{{ $productDetails->model_number }}</strong></label>
                </div>
                <div class="control-group">
                    <label class="control-label">Alternate Image</label>
                    <div class="controls">
                        <input type="file" name="image[]" id="image" multiple="multiple">
                    </div>
                </div>
                <div class="form-actions">
                    <input type="submit" value="Add Images" class="btn btn-success">
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Images</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($productImages as $image)
                <tr class="gradeX">
                  <td class="center"><img width=130px src="{{ asset('images/backend_images/product/small/'.$image->image) }}"></td>
                  <td class="center"><a rel="{{ $image->id }}" rel1="delete-alt-image" href="javascript:" class="btn btn-danger btn-mini deleteRecord" title="Delete Alt Image">Delete</a></td>
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
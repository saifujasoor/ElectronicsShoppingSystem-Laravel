@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a>Products</a> <a class="current">Add Product Attributes</a> </div>
    <h1>Add Products Attributes</h1>
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
            <h5>Add Product Attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-attributes/'.$productDetails->id) }}" name="add_product" id="add_product">{{ csrf_field() }}
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
                    <label class="control-label"></label>
                    <div class="field_wrapper">
                      <div>
                          <input required type="text" name="ram[]" id="ram" placeholder="RAM" style="width:120px;" />
                          <input required type="text" name="storage[]" id="storage" placeholder="Storage" style="width:120px;" />
                          <input required type="text" name="color[]" id="color" placeholder="Color" style="width:120px;" />
                          <input required type="number" name="price[]" id="price" placeholder="Price" style="width:120px;" />
                          <input required type="number" name="stock[]" id="stock" placeholder="Stock" style="width:120px;" />
                          <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                      </div>
                  </div>
                  </div>
                  <div class="form-actions">
                    <input type="submit" value="Add Attributes" class="btn btn-success">
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
            <h5>View Attributes</h5>
          </div>
          <div class="widget-content nopadding" style=" overflow-x:auto;">
            <form action="{{ url('/admin/edit-attributes/'.$productDetails->id) }}" method="post">{{ csrf_field() }}
              <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>RAM</th>
                  <th>Storage</th>
                  <th>Color</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($productDetails['attributes'] as $attribute)
                  <tr class="gradeX">
                      <input type="hidden" name="idAttr[]" value="{{ $attribute->id }}">
                      <td><input type="text" name="ram[]" value="{{ $attribute->ram }}" style="width: 75%;"></td>
                      <td><input type="text" name="storage[]" value="{{ $attribute->storage }}" style="width: 75%;"></td>
                      <td><input type="text" name="color[]" value="{{ $attribute->color }}" style="width: 75%;"></td>
                      <td><input type="text" name="price[]" value="{{ $attribute->price }}" style="width: 75%;"></td>
                      <td><input type="text" name="stock[]" value="{{ $attribute->stock }}" style="width: 75%;"></td>
                      <td class="center">
                        <input type="submit" value="update" class="btn btn-primary btn-mini">
                        <a rel="{{ $attribute->id }}" rel1="delete-attribute" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                  </tr>  
              @endforeach      
              </tbody>
            </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
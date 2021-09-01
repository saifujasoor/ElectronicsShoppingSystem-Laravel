@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a>View Products</a> <a class="current">View Product</a> </div>
    <h1>View Products</h1>
    @if (Session::has('flash_message_error'))
    <div class="alert alert-error alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{!! session('flash_message_error') !!} </strong>
    </div>
    @endif
    @if (Session::has('flash_message_success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{!! session('flash_message_success') !!} </strong>
    </div>
    @endif
    @if (count($errors)>0)
      <div class="alert alert-error alert-block">
        Upload Validation Error<br><br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>
  
  <div style="margin-left:20px;float:left;">
    <a href="{{url('/admin/export-products')}}" class="btn btn-primary btn-mini">Reports</a> 
  </div> 
  <form style="float:right; margin-right:20px;" method="post" enctype="multipart/form-data" action="{{ url('/admin/import-products') }}">
    {{ csrf_field() }}
     <?php // <input type="file" name="select_file"> 
      // <input type="submit" name="upload" class="btn btn-primary btn-mini" value="Import"> ?>
   </form>
  <div class="container-fluid">
    <br>
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Products</h5>
          </div>
          <div class="widget-content nopadding" style=" overflow-x:auto;">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Product Name</th>
                  <th>Image</th>
                  <th>Model Number</th>
                  <th>Operating System</th>
                  <th>Processor Type</th>
                  <th>Processor Core</th>
                  <th>Primary Camera</th>
                  <th>Secondary Camera</th>
                  <th>Battery Capacity</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr class="gradeX">
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->product_name }}</td>
                  <td>
                    @if (!empty($product->image))
                    <img src="{{ asset('/images/backend_images/product/small/'.$product->image)}}" style="width:50px;">
                    @endif
                  </td>
                  <td>{{ $product->model_number }}</td>
                  <td>{{ $product->operating_system }}</td>
                  <td>{{ $product->processor_type }}</td>
                  <td>{{ $product->processor_core }}</td>
                  <td>{{ $product->primary_camera }}</td>
                  <td>{{ $product->secondary_camera }}</td>
                  <td>{{ $product->battery_capacity }}</td>
                  <td class="center">
                    <a href="#exampleModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini" title="View Product" style="margin-bottom: 5px;">View</a>
                    <a href="{{ url('/admin/edit-product/'.$product->id) }}" class="btn btn-primary btn-mini" title="Edit Product" style="margin-bottom: 5px;">Edit</a>
                    <a href="{{ url('/admin/add-attributes/'.$product->id) }}" class="btn btn-success btn-mini" title="Add Attributes" style="margin-bottom: 5px;">Add Attributes</a>
                    <a href="{{ url('/admin/add-images/'.$product->id) }}" class="btn btn-info btn-mini" title="Add Images" style="margin-bottom: 5px;">Add Images</a>
                    <a rel="{{ $product->id }}" rel1="delete-product" href="javascript:"
                      class="btn btn-danger btn-mini deleteRecord" title="Delete Product" style="margin-bottom: 5px;">Delete</a>
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
@foreach ($products as $product)
<div id="exampleModal{{ $product->id }}" aria-hidden="true" class="modal fade">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $product->product_name }} Full Details</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table>
            <tr>
              <td style="font-size: 14px;">Product Name </td>
              <td style="font-size: 14px;">{{ $product->product_name }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Category Name </td>
              <td style="font-size: 14px;">{{ $product->name }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Model Name </td>
              <td style="font-size: 14px;">{{ $product->model_name }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Model Number </td>
              <td style="font-size: 14px;">{{ $product->model_number  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Description </td>
              <td style="font-size: 14px;">{{ $product->description  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Browse Type </td>
              <td style="font-size: 14px;">{{ $product->browse_type  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">SIM Type </td>
              <td style="font-size: 14px;">{{ $product->sim_type  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Hybrid Sim Slot </td>
              <td style="font-size: 14px;">@if($product->hybrid_sim_slot==0)NO @else YES @endif</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Touch Screen </td>
              <td style="font-size: 14px;">@if($product->touch_screen==0)NO @else YES @endif</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">OTG Compatible </td>
              <td style="font-size: 14px;">@if($product->otg_compatible==0)NO @else YES @endif</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Display Size </td>
              <td style="font-size: 14px;">{{ $product->display_size  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Resolution </td>
              <td style="font-size: 14px;">{{ $product->resolution  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Resolution Type </td>
              <td style="font-size: 14px;">{{ $product->resolution_type  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Other Display Features </td>
              <td style="font-size: 14px;">{{ $product->other_display_features  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Operating System </td>
              <td style="font-size: 14px;">{{ $product->operating_system  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Processor Type </td>
              <td style="font-size: 14px;">{{ $product->processor_type  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Processor Core</td>
              <td style="font-size: 14px;">{{ $product->processor_core  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Primary Clock Speed </td>
              <td style="font-size: 14px;">{{ $product->primary_clock_speed  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Secondary Clock Speed </td>
              <td style="font-size: 14px;">{{ $product->secondary_clock_speed  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Operating Frequency </td>
              <td style="font-size: 14px;">{{ $product->operating_frequency  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Supported Memory Card Type </td>
              <td style="font-size: 14px;">{{ $product->supported_memory_card_type  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Memory Card Slot Type </td>
              <td style="font-size: 14px;">{{ $product->memory_card_slot_type  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Primary Camera Available </td>
              <td style="font-size: 14px;">@if($product->primary_camera_available==0)NO @else YES @endif</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Primary Camera </td>
              <td style="font-size: 14px;">{{ $product->primary_camera  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Primary Camera Features </td>
              <td style="font-size: 14px;">{{ $product->primary_camera_features  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Secondary Camera Available </td>
              <td style="font-size: 14px;">@if($product->secondary_camera_available==0)NO @else YES @endif</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Secondary Camera </td>
              <td style="font-size: 14px;">{{ $product->secondary_camera  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Secondary Camera Features </td>
              <td style="font-size: 14px;">{{ $product->secondary_camera_features  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Flash </td>
              <td style="font-size: 14px;">{{ $product->flash  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Dual Camera Lens </td>
              <td style="font-size: 14px;">{{ $product->dual_camera_lens  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Network Type </td>
              <td style="font-size: 14px;">{{ $product->network_type  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Supported Networks </td>
              <td style="font-size: 14px;">{{ $product->supported_networks  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Internet Connectivity </td>
              <td style="font-size: 14px;">{{ $product->internet_connectivity }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">GPRS </td>
              <td style="font-size: 14px;">@if($product->gprs==0)NO @else YES @endif</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Pre-installed Browser </td>
              <td style="font-size: 14px;">{{ $product->pre_installed_browser }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Micro USB Support </td>
              <td style="font-size: 14px;">{{ $product->micro_usb_port }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Bluetooth Support </td>
              <td style="font-size: 14px;">@if($product->blutooth_support==0)NO @else YES @endif</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Bluetooth Version </td>
              <td style="font-size: 14px;">{{ $product->blutooth_version  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Wi-Fi </td>
              <td style="font-size: 14px;">@if($product->wifi==0)NO @else YES @endif</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Wi-Fi Version </td>
              <td style="font-size: 14px;">{{ $product->wifi_version  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">USB Connectivity </td>
              <td style="font-size: 14px;">@if($product->usb_connectivity==0)NO @else YES @endif</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Audio Jack </td>
              <td style="font-size: 14px;">{{ $product->audio_jack  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Touchscreen Type </td>
              <td style="font-size: 14px;">{{ $product->touchscreen_type  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">SIM Size </td>
              <td style="font-size: 14px;">{{ $product->sim_size  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Sensors </td>
              <td style="font-size: 14px;">{{ $product->sensors  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Other Features </td>
              <td style="font-size: 14px;">{{ $product->other_features  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">GPS Type </td>
              <td style="font-size: 14px;">{{ $product->gps_type  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">FM Radio </td>
              <td style="font-size: 14px;">@if($product->fm_radio==0)NO @else YES @endif</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Audio Format </td>
              <td style="font-size: 14px;">{{ $product->audio_format }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Video Formats </td>
              <td style="font-size: 14px;">{{ $product->video_format  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Battery Capacity </td>
              <td style="font-size: 14px;">{{ $product->battery_capacity  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Width</td>
              <td style="font-size: 14px;">{{ $product->width }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Height </td>
              <td style="font-size: 14px;">{{ $product->height  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Depth </td>
              <td style="font-size: 14px;">{{ $product->depth  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Weight </td>
              <td style="font-size: 14px;">{{ $product->weight  }}</td>
            </tr>
            <tr>
              <td style="font-size: 14px;">Warranty </td>
              <td style="font-size: 14px;">{{ $product->warranty }}</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection
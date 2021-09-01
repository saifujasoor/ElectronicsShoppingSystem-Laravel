@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a>Edit Products</a> <a class="current">Edit Product</a> </div>
    <h1>Edit Products</h1>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-product/'.$productDetails->id) }}" name="edit_product"
              id="edit_product" novalidate="novalidate"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Category Name</label>
                <div class="controls">
                  <select name="category_id" id="category_id" style="width:220px;">
                    <?php echo $categories_dropdown; ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" value="{{ $productDetails->product_name }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                  <input type="hidden" name="current_image" value="{{ $productDetails->image }}">
                @if(!empty($productDetails->image))
                    <img style="width:40px;" src="{{ asset('/images/backend_images/product/small/'.$productDetails->image) }}"> | <a href="{{ url('/admin/delete-product-image/'.$productDetails->id) }}"> Delete</a>
                @endif
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description" cols="30" rows="3">{{ $productDetails->description }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Model Name</label>
                <div class="controls">
                  <input type="text" name="model_name" id="model_name" value="{{ $productDetails->model_name }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Model Number</label>
                <div class="controls">
                  <input type="text" name="model_number" id="model_number" value="{{ $productDetails->model_number }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Browse Type</label>
                <div class="controls">
                  <input type="text" name="browse_type" id="browse_type" value="{{ $productDetails->browse_type	}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">SIM Type</label>
                <div class="controls">
                  <input type="text" name="sim_type" id="sim_type" value="{{ $productDetails->sim_type }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Hybrid SIM Slot</label>
                <div class="controls">
                  <select name="hybrid_sim_slot" style="width:220px;">
                    @if($productDetails->hybrid_sim_slot == 0)
                      <option value="0" hidden="">NO</option>
                    @else
                      <option value="1" hidden="">YES</option>
                    @endif
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Touch Screen</label>
                <div class="controls">
                  <select name="touch_screen" style="width:220px;">
                    @if($productDetails->touch_screen == 0)
                      <option value="0" hidden="">NO</option>
                    @else
                      <option value="1" hidden="">YES</option>
                    @endif
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">OTG Compatible</label>
                <div class="controls">
                  <select name="otg_compatible" style="width:220px;">
                    @if($productDetails->otg_compatible == 0)
                      <option value="0" hidden="">NO</option>
                    @else
                      <option value="1" hidden="">YES</option>
                    @endif
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Display Size</label>
                <div class="controls">
                  <input type="text" name="display_size" id="display_size" value="{{ $productDetails->display_size }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Resolution</label>
                <div class="controls">
                  <input type="text" name="resolution" id="resolution" value="{{ $productDetails->resolution }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Resolution Type</label>
                <div class="controls">
                  <input type="text" name="resolution_type" id="resolution_type" value="{{ $productDetails->resolution_type }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Other Display Features</label>
                <div class="controls">
                  <textarea name="other_display_features" id="other_display_features" cols="30" rows="3">{{ $productDetails->other_display_features }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Operating System</label>
                <div class="controls">
                  <input type="text" name="operating_system" id="operating_system" value="{{ $productDetails->operating_system }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Processor Type</label>
                <div class="controls">
                  <input type="text" name="processor_type" id="processor_type" value="{{ $productDetails->processor_type }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Processor Core</label>
                <div class="controls">
                  <input type="text" name="processor_core" id="processor_core" value="{{ $productDetails->processor_core }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Primary Clock Speed</label>
                <div class="controls">
                  <input type="text" name="primary_clock_speed" id="primary_clock_speed" value="{{ $productDetails->primary_clock_speed }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Secondary Clock Speed</label>
                <div class="controls">
                  <input type="text" name="secondary_clock_speed" id="secondary_clock_speed" value="{{ $productDetails->secondary_clock_speed }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Operating Frequency</label>
                <div class="controls">
                  <textarea name="operating_frequency" id="operating_frequency" cols="30" rows="3">{{ $productDetails->operating_frequency }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Supported Memory Card Type</label>
                <div class="controls">
                  <input type="text" name="supported_memory_card_type" id="supported_memory_card_type" value="{{ $productDetails->supported_memory_card_type }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Memory Card Slot Type</label>
                <div class="controls">
                  <input type="text" name="memory_card_slot_type" id="memory_card_slot_type" value="{{ $productDetails->memory_card_slot_type }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Primary Camera Available</label>
                <div class="controls">
                  <select name="primary_camera_available" style="width:220px;">
                    @if($productDetails->primary_camera_available == 0)
                      <option value="0" hidden="">NO</option>
                    @else
                      <option value="1" hidden="">YES</option>
                    @endif
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Primary Camera</label>
                <div class="controls">
                  <input type="text" name="primary_camera" id="primary_camera" value="{{ $productDetails->primary_camera }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Primary Camera Features</label>
                <div class="controls">
                  <textarea name="primary_camera_features" id="primary_camera_features" cols="30" rows="3">{{ $productDetails->primary_camera_features }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Secondary Camera Available</label>
                <div class="controls">
                  <select name="secondary_camera_available" style="width:220px;">
                    @if($productDetails->secondary_camera_available == 0)
                      <option value="0" hidden="">NO</option>
                    @else
                      <option value="1" hidden="">YES</option>
                    @endif
                      <option value="0">NO</option>
                      <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Secondary Camera</label>
                <div class="controls">
                  <input type="text" name="secondary_camera" id="secondary_camera" value="{{ $productDetails->secondary_camera }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> Secondary Camera Features</label>
                <div class="controls">
                  <textarea name="secondary_camera_features" id="secondary_camera_features" cols="30" rows="3">{{ $productDetails->secondary_camera_features }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Flash</label>
                <div class="controls">
                  <input type="text" name="flash" id="flash" value="{{ $productDetails->flash }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Dual Camera Lens</label>
                <div class="controls">
                  <input type="text" name="dual_camera_lens" id="dual_camera_lens" value="{{ $productDetails->dual_camera_lens }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Network Type</label>
                <div class="controls">
                  <input type="text" name="network_type" id="network_type" value="{{ $productDetails->network_type }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Supported Networks</label>
                <div class="controls">
                  <input type="text" name="supported_networks" id="supported_networks" value="{{ $productDetails->supported_networks }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Internet Connectivity</label>
                <div class="controls">
                  <input type="text" name="internet_connectivity" id="internet_connectivity" value="{{ $productDetails->internet_connectivity }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> GPRS</label>
                <div class="controls">
                  <select name="gprs" style="width:220px;">
                    @if($productDetails->gprs == 0)
                      <option value="0" hidden="">NO</option>
                    @else
                      <option value="1" hidden="">YES</option>
                    @endif
                      <option value="0">NO</option>
                      <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Pre-installed Browser</label>
                <div class="controls">
                  <input type="text" name="pre_installed_browser" id="pre_installed_browser" value="{{ $productDetails->pre_installed_browser }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Micro USB Port</label>
                <div class="controls">
                  <input type="text" name="micro_usb_port" id="micro_usb_port" value="{{ $productDetails->micro_usb_port }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Bluetooth Support</label>
                <div class="controls">
                  <select name="blutooth_support" style="width:220px;">
                    @if($productDetails->blutooth_support == 0)
                      <option value="0" hidden="">NO</option>
                    @else
                      <option value="1" hidden="">YES</option>
                    @endif
                      <option value="0">NO</option>
                      <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Bluetooth Version</label>
                <div class="controls">
                  <input type="text" name="blutooth_version" id="blutooth_version" value="{{ $productDetails->blutooth_version }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Wi-Fi</label>
                <div class="controls">
                  <select name="wifi" style="width:220px;">
                    @if($productDetails->wifi == 0)
                    <option value="0" hidden="">NO</option>
                    @else
                      <option value="1" hidden="">YES</option>
                    @endif
                      <option value="0">NO</option>
                      <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Wi-Fi Version</label>
                <div class="controls">
                  <input type="text" name="wifi_version" id="wifi_version" value="{{ $productDetails->wifi_version }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">USB Connectivity</label>
                <div class="controls">
                  <select name="usb_connectivity" style="width:220px;">
                    @if($productDetails->wifi == 0)
                    <option value="0" hidden="">NO</option>
                    @else
                      <option value="1" hidden="">YES</option>
                    @endif
                      <option value="0">NO</option>
                      <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Audio Jack</label>
                <div class="controls">
                  <input type="text" name="audio_jack" id="audio_jack" value="{{ $productDetails->audio_jack }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Touchscreen Type</label>
                <div class="controls">
                  <input type="text" name="touchscreen_type" id="touchscreen_type" value="{{ $productDetails->touchscreen_type }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">SIM Size</label>
                <div class="controls">
                  <input type="text" name="sim_size" id="sim_size" value="{{ $productDetails->sim_size }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Sensors</label>
                <div class="controls">
                  <input type="text" name="sensors" id="sensors" value="{{ $productDetails->sensors }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Other Features</label>
                <div class="controls">
                  <textarea name="other_features" id="other_features" cols="30" rows="3">{{ $productDetails->other_features }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">GPS Type</label>
                <div class="controls">
                  <input type="text" name="gps_type" id="gps_type" value="{{ $productDetails->gps_type }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">FM Radio</label>
                <div class="controls">
                  <select name="fm_radio" style="width:220px;">
                    @if($productDetails->fm_radio == 0)
                    <option value="0" hidden="">NO</option>
                    @else
                      <option value="1" hidden="">YES</option>
                    @endif
                      <option value="0">NO</option>
                      <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> Audio Formats</label>
                <div class="controls">
                  <input type="text" name="audio_format" id="audio_format" value="{{ $productDetails->audio_format }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Video Formats</label>
                <div class="controls">
                  <input type="text" name="video_format" id="video_format" value="{{ $productDetails->video_format }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Battery Capacity</label>
                <div class="controls">
                  <input type="text" name="battery_capacity" id="battery_capacity" value="{{ $productDetails->battery_capacity }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Width</label>
                <div class="controls">
                  <input type="text" name="width" id="width" value="{{ $productDetails->width }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Height</label>
                <div class="controls">
                  <input type="text" name="height" id="height" value="{{ $productDetails->height }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Depth</label>
                <div class="controls">
                  <input type="text" name="depth" id="depth" value="{{ $productDetails->depth }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Weight</label>
                <div class="controls">
                  <input type="text" name="weight" id="weight" value="{{ $productDetails->weight }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Warranty Summary</label>
                <div class="controls">
                  <textarea name="warranty" id="warranty" cols="30" rows="3">{{ $productDetails->warranty }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" @if($productDetails->status=="1") checked @endif value="1">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
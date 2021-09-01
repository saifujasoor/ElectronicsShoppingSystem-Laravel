@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a>Add Products</a> <a class="current">Add Product</a> </div>
    <h1>Add Products</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-product') }}" name="add_product"
              id="add_product" novalidate="novalidate"> {{ csrf_field() }}
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
                  <input type="text" name="product_name" id="product_name" placeholder="Product Name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <div class="uploader" id="uniform-undefined"><input type="file" name="image" id="image" size="19"
                      style="opacity: 0;"><span class="filename">No file selected</span><span class="action">Choose
                      File</span></div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description" placeholder="Description" cols="30" rows="3"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Model Name</label>
                <div class="controls">
                  <input type="text" name="model_name" id="model_name" placeholder="Model Name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Model Number</label>
                <div class="controls">
                  <input type="text" name="model_number" id="model_number" placeholder="Model Number">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Browse Type</label>
                <div class="controls">
                  <input type="text" name="browse_type" id="browse_type" placeholder="Browse Type">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">SIM Type</label>
                <div class="controls">
                  <input type="text" name="sim_type" id="sim_type" placeholder="SIM Type">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Hybrid SIM Slot</label>
                <div class="controls">
                  <select name="hybrid_sim_slot" style="width:220px;">
                    <option hidden="">Select Option</option>
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Touch Screen</label>
                  <div class="controls">
                  <select name="touch_screen" style="width:220px;">
                    <option hidden="">Select Option</option>
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">OTG Compatible</label>
                <div class="controls">
                  <select name="otg_compatible" style="width:220px;">
                    <option hidden="">Select Option</option>
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Display Size</label>
                <div class="controls">
                  <input type="text" name="display_size" id="display_size" placeholder="Display Size">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Resolution</label>
                <div class="controls">
                  <input type="text" name="resolution" id="resolution" placeholder="Resolution">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Resolution Type</label>
                <div class="controls">
                  <input type="text" name="resolution_type" id="resolution_type" placeholder="Resolution Type">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Other Display Features</label>
                <div class="controls">
                  <textarea name="other_display_features" id="other_display_features" cols="30" rows="3" placeholder="Other Display Features"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Operating System</label>
                <div class="controls">
                  <input type="text" name="operating_system" id="operating_system" placeholder="Operating System">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Processor Type</label>
                <div class="controls">
                  <input type="text" name="processor_type" id="processor_type" placeholder="Processor Type">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Processor Core</label>
                <div class="controls">
                  <input type="text" name="processor_core" id="processor_core" placeholder="Processor Core">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Primary Clock Speed</label>
                <div class="controls">
                  <input type="text" name="primary_clock_speed" id="primary_clock_speed" placeholder="Primary Clock Speed">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Secondary Clock Speed</label>
                <div class="controls">
                  <input type="text" name="secondary_clock_speed" id="secondary_clock_speed" placeholder="Secondary Clock Speed">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Operating Frequency</label>
                <div class="controls">
                  <textarea name="operating_frequency" id="operating_frequency" cols="30" rows="3" placeholder="Operating Frequency"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Supported Memory Card Type</label>
                <div class="controls">
                  <input type="text" name="supported_memory_card_type" id="supported_memory_card_type" placeholder="Supported Memory Card Type">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Memory Card Slot Type</label>
                <div class="controls">
                  <input type="text" name="memory_card_slot_type" id="memory_card_slot_type" placeholder="Memory Card Slot Type">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Primary Camera Available</label>
                <div class="controls">
                  <select name="primary_camera_available" style="width:220px;">
                    <option hidden="">Select Option</option>
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Primary Camera</label>
                <div class="controls">
                  <input type="text" name="primary_camera" id="primary_camera" placeholder="Primary Camera">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Primary Camera Features</label>
                <div class="controls">
                  <textarea name="primary_camera_features" id="primary_camera_features" cols="30" rows="3" placeholder="Primary Camera Features"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Secondary Camera Available</label>
                <div class="controls">
                  <select name="secondary_camera_available" style="width:220px;">
                    <option hidden="">Select Option</option>
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Secondary Camera</label>
                <div class="controls">
                  <input type="text" name="secondary_camera" id="secondary_camera" placeholder="Secondary Camera">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> Secondary Camera Features</label>
                <div class="controls">
                  <textarea name="secondary_camera_features" id="secondary_camera_features" cols="30" rows="3" placeholder="Secondary Camera Features"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Flash</label>
                <div class="controls">
                  <input type="text" name="flash" id="flash" placeholder="Flash">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Dual Camera Lens</label>
                <div class="controls">
                  <input type="text" name="dual_camera_lens" id="dual_camera_lens" placeholder="Dual Camera Lens">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Network Type</label>
                <div class="controls">
                  <input type="text" name="network_type" id="network_type" placeholder="Network Type">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Supported Networks</label>
                <div class="controls">
                  <input type="text" name="supported_networks" id="supported_networks" placeholder="Supported Networks">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Internet Connectivity</label>
                <div class="controls">
                  <input type="text" name="internet_connectivity" id="internet_connectivity" placeholder="Internet Connnectivity">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> GPRS</label>
                <div class="controls">
                  <select name="gprs" style="width:220px;">
                    <option hidden="">Select Option</option>
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Pre-installed Browser</label>
                <div class="controls">
                  <input type="text" name="pre_installed_browser" id="pre_installed_browser" placeholder="Pre-installed Browser">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Micro USB Port</label>
                <div class="controls">
                  <input type="text" name="micro_usb_port" id="micro_usb_port" placeholder="Micro USB Port">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Bluetooth Support</label>
                <div class="controls">
                  <select name="blutooth_support" style="width:220px;">
                    <option hidden="">Select Option</option>
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Bluetooth Version</label>
                <div class="controls">
                  <input type="text" name="blutooth_version" id="blutooth_version" placeholder="Bluetooth Version">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Wi-Fi</label>
                <div class="controls">
                  <select name="wifi" style="width:220px;">
                    <option hidden="">Select Option</option>
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Wi-Fi Version</label>
                <div class="controls">
                  <input type="text" name="wifi_version" id="wifi_version" placeholder="Wi-Fi Version">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">USB Connectivity</label>
                <div class="controls">
                  <select name="usb_connectivity" style="width:220px;">
                    <option hidden="">Select Option</option>
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Audio Jack</label>
                <div class="controls">
                  <input type="text" name="audio_jack" id="audio_jack" placeholder="Audio Jack">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Touchscreen Type</label>
                <div class="controls">
                  <input type="text" name="touchscreen_type" id="touchscreen_type" placeholder="Touchscreen Type">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">SIM Size</label>
                <div class="controls">
                  <input type="text" name="sim_size" id="sim_size" placeholder="SIM Size">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Sensors</label>
                <div class="controls">
                  <input type="text" name="sensors" id="sensors" placeholder="Sensors">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Other Features</label>
                <div class="controls">
                  <textarea name="other_features" id="other_features" cols="30" rows="3" placeholder="Other Features"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">GPS Type</label>
                <div class="controls">
                  <input type="text" name="gps_type" id="gps_type" placeholder="GPS Typw">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">FM Radio</label>
                <div class="controls">
                  <select name="fm_radio" style="width:220px;">
                    <option hidden="">Select Option</option>
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"> Audio Formats</label>
                <div class="controls">
                  <input type="text" name="audio_format" id="audio_format" placeholder="Audio Formats">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Video Formats</label>
                <div class="controls">
                  <input type="text" name="video_format" id="video_format" placeholder="Video Formats">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Battery Capacity</label>
                <div class="controls">
                  <input type="text" name="battery_capacity" id="battery_capacity" placeholder="Battery Capacity">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Width</label>
                <div class="controls">
                  <input type="text" name="width" id="width" placeholder="Width">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Height</label>
                <div class="controls">
                  <input type="text" name="height" id="height" placeholder="Height">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Depth</label>
                <div class="controls">
                  <input type="text" name="depth" id="depth" placeholder="Depth">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Weight</label>
                <div class="controls">
                  <input type="text" name="weight" id="weight" placeholder="Weight">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Warranty Summary</label>
                <div class="controls">
                  <textarea name="warranty" id="warranty" cols="30" rows="3" placeholder="Warranty Summary"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1"> 
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add Product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
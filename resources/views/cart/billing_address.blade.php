<form class="main-form">
    <div class="container">
      <div class="row">
        <div class="col-10">
          <div class="heading-part">
            <h3 class="sub-heading">Billing Address</h3>
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-box">
            <input type="text" required placeholder="Full Name" disabled name="customer_name" value="{{$addressDetails->customer_name}}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-box">
            <input type="email" required placeholder="Email Address" disabled name="email" value="{{$addressDetails->email}}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-box">
            <input type="text" required placeholder="Contact Number" disabled name="contact_no" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57;" value="{{$addressDetails->contact_no }}">
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="input-box select-dropdown">
            <fieldset>
              <select name="area" class="browser-default custom-select city" disabled onchange="selectcity();selectstate();">
                @foreach ($areas as $area)
                    @if($area->id == $addressDetails->area_id)
                        <option value="{{ $area->id }}" selected>{{ $area->name }} - {{$area->pincode}}</option>
                    @else
                        <option value="{{ $area->id }}">{{ $area->name }} - {{$area->pincode}}</option>
                    @endif
                @endforeach
              </select>
            </fieldset>
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-box">
            <input type="text" disabled="" placeholder="Select City" id="getcity" value="{{$citiesdata->name}}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-box">
            <input type="text" disabled="" placeholder="Select State" id="getstate"  value="{{$addstates->name}}">
          </div>
        </div>
        <div class="col-md-12">
          <div class="input-box">
            <input type="text" required placeholder="Shipping Address" disabled name="address" value="{{$addressDetails->address}}">
            <span>Please provide the number and street.</span> 
          </div>
        </div>
        <div class="col-md-12">
          <div class="input-box">
            <input type="text" required placeholder="Shipping Landmark" disabled name="landmark" value="{{$addressDetails->landmark}}">
            <span>Please include landmark (e.g : Opposite Bank) as the carrier service may find it easier to locate your address.</span> 
          </div>
        </div>
      </div>
    </div>
  </form>
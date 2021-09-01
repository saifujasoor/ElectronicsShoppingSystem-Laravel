<form class="main-form full" action="{{ url('/edit-add/'.$addressDetails->id) }}" method="POST">{{csrf_field()}}
    <div class="mb-20">
      <div class="row">
        <div class="col-12 mb-20">
          <div class="heading-part">
            <h3 class="sub-heading" style="margin-top: 20px;">Shipping Address</h3>
          </div>
          <hr>
        </div>
        <div class="col-md-6">
          <div class="input-box">
            <input type="text" required placeholder="Full Name" name="customer_name" value="{{ $addressDetails->customer_name }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-box">
            <input type="email" required placeholder="Email Address" name="email" value="{{ $addressDetails->email }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-box">
            <input type="text" required placeholder="Contact Number" name="contact_no" value="{{ $addressDetails->contact_no }}">
          </div>
        </div>  
        <div class="col-md-6">
          <div class="input-box select-dropdown">
            <fieldset>
              <select name="area_id" class="area" onchange="cityedit();stateedit();">
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
            <input type="text" disabled="" placeholder="Select City" id="getcityname" value="{{$citiesdata->name}}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-box">
            <input type="text" disabled="" placeholder="Select State" id="getstatename" value="{{$addstates->name}}">
          </div>
        </div>
        <div class="col-md-12">
          <div class="input-box">
            <input type="text" required placeholder="Shipping Address" name="address" value="{{ $addressDetails->address }}">
            <span>Please provide the number and street.</span>
          </div>
        </div>
        <div class="col-md-12">
          <div class="input-box">
            <input type="text" required placeholder="Shipping Landmark" name="landmark" value="{{ $addressDetails->landmark }}">
            <span>Please include landmark (e.g : Opposite Bank) as the carrier service may find it easier to
              locate your address.</span>
          </div>
        </div>
        <div class="col-12">
          <div class="left-side" style="display:flex;">
                @if($addressDetails->flag == 1)
                  <input type="checkbox" name="flag" id="flag1" checked="" style="width: 20px;height: 20px;">
                @else
                  <input type="checkbox" name="flag" id="flag1" style="width: 20px;height: 20px;">
                @endif
              <label for="remember_me" style="line-height: 3;margin-left: 10px;">Select as a default</label>
          </div>
        </div>
        <input type="hidden" id="flags" name="flags">
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <button title="Update data" class="btn-color" onclick="check();">Edit Address</button>
      </div>
    </div>
  </form>

  <script type="text/javascript">
    function cityedit(){
      var id = $(".area").val();
      // alert(id);
      $.ajax({
        type: "GET",
        url: "/get-address-city",
        data: "idCity="+id,
        cache: false,
        success: function(response)
        {
          // alert(response);
          document.getElementById('getcityname').value=response;
        }
      });
    }
    function stateedit(){
      var id = $(".area").val();
      // alert(id);
      $.ajax({
        type: "GET",
        url: "/get-address-state",
        data: "idState="+id,
        cache: false,
        success: function(response)
        {
          // alert(response);
          document.getElementById('getstatename').value=response;
        }
      });
    }

    function check(){
      var a = document.getElementById('flag1');
      if(a.checked == true){
        document.getElementById('flags').value = 1;
        // alert("f");
      }else{
        document.getElementById('flags').value = 0;
        // alert("H");
      }
    }

    </script>
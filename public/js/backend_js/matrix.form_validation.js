$(document).ready(function(){

	$("#current_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'get',
			url:'/admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				//alert(resp);
				if(resp=="false"){
					$("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
				}else if(resp=="true"){
					$("#chkPwd").html("<font color='green'>Current Password is Correct</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Add Category Validation
    $("#add_category").validate({
		rules:{
			category_name:{
				required:true
			},
			url:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Edit Category Validation
    $("#edit_category").validate({
		rules:{
			category_name:{
				required:true
			},
			url:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Add Product Validation
    $("#add_product").validate({
		rules:{
			category_id:{
				required:true
			},
			product_name:{
				required:true
			},
			product_code:{
				required:true
			},
            description:{
				required:true
			},
            model_name:{
				required:true
			},
            model_number:{
				required:true
			},
            browse_type:{
				required:true
			},
            sim_type:{
				required:true
			},
            hybrid_sim_slot:{
				required:true
			},
            touch_screen:{
				required:true
			},
            otg_compatible:{
				required:true
			},
            display_size:{
				required:true
			},
            resolution:{
				required:true
			},
            resolution_type:{
				required:true
			},
            other_display_features:{
				required:true
			},
            operating_system:{
				required:true
			},
            processor_type:{
				required:true
			},
            processor_core:{
				required:true
			},
			primary_clock_speed:{
				required:true
			},
			secondary_clock_speed:{
				required:true
			},
			operating_frequency:{
				required:true
			},
            supported_memory_card_type:{
				required:true
			},
            memory_card_slot_type:{
				required:true
			},
            primary_camera_available:{
				required:true
			},
            primary_camera:{
				required:true
			},
            primary_camera_features:{
				required:true
			},
            secondary_camera_available:{
				required:true
			},
            secondary_camera:{
				required:true
			},
            secondary_camera_features:{
				required:true
			},
            flash:{
				required:true
			},
            dual_camera_lens:{
				required:true
			},
            network_type:{
				required:true
			},
            supported_networks:{
				required:true
			},
            internet_connectivity:{
				required:true
			},
            gprs:{
				required:true
			},
            pre_installed_browser:{
				required:true
			},
            micro_usb_port:{
				required:true
			},
            blutooth_support:{
				required:true
			},
            blutooth_version:{
				required:true
			},
            wifi:{
				required:true
			},
            wifi_version:{
				required:true
			},
            usb_connectivity:{
				required:true
			},
            audio_jack:{
				required:true
			},
            touchscreen_type:{
				required:true
			},
            sim_size:{
				required:true
			},
            sensors:{
				required:true
			},
            other_features:{
				required:true
			},
            gps_type:{
				required:true
			},
            fm_radio:{
				required:true
			},
            audio_format:{
				required:true
			},
            video_format:{
				required:true
			},
            battery_capacity:{
				required:true
			},
            width:{
				required:true
			},
            height:{
				required:true
			},
            depth:{
				required:true
			},
            weight:{
				required:true
			},
            warranty:{
				required:true
			},
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Edit Product Validation
    $("#edit_product").validate({
		rules:{
			category_id:{
				required:true
			},
			product_name:{
				required:true
			},
			product_code:{
				required:true
			},
            description:{
				required:true
			},
            model_name:{
				required:true
			},
            model_number:{
				required:true
			},
            browse_type:{
				required:true
			},
            sim_type:{
				required:true
			},
            hybrid_sim_slot:{
				required:true
			},
            touch_screen:{
				required:true
			},
            otg_compatible:{
				required:true
			},
            display_size:{
				required:true
			},
            resolution:{
				required:true
			},
            resolution_type:{
				required:true
			},
            other_display_features:{
				required:true
			},
            operating_system:{
				required:true
			},
            processor_type:{
				required:true
			},
            processor_core:{
				required:true
			},
			primary_clock_speed:{
				required:true
			},
			secondary_clock_speed:{
				required:true
			},
			operating_frequency:{
				required:true
			},
            supported_memory_card_type:{
				required:true
			},
            memory_card_slot_type:{
				required:true
			},
            primary_camera_available:{
				required:true
			},
            primary_camera:{
				required:true
			},
            primary_camera_features:{
				required:true
			},
            secondary_camera_available:{
				required:true
			},
            secondary_camera:{
				required:true
			},
            secondary_camera_features:{
				required:true
			},
            flash:{
				required:true
			},
            dual_camera_lens:{
				required:true
			},
            network_type:{
				required:true
			},
            supported_networks:{
				required:true
			},
            internet_connectivity:{
				required:true
			},
            gprs:{
				required:true
			},
            pre_installed_browser:{
				required:true
			},
            micro_usb_port:{
				required:true
			},
            blutooth_support:{
				required:true
			},
            blutooth_version:{
				required:true
			},
            wifi:{
				required:true
			},
            wifi_version:{
				required:true
			},
            usb_connectivity:{
				required:true
			},
            audio_jack:{
				required:true
			},
            touchscreen_type:{
				required:true
			},
            sim_size:{
				required:true
			},
            sensors:{
				required:true
			},
            other_features:{
				required:true
			},
            gps_type:{
				required:true
			},
            fm_radio:{
				required:true
			},
            audio_format:{
				required:true
			},
            video_format:{
				required:true
			},
            battery_capacity:{
				required:true
			},
            width:{
				required:true
			},
            height:{
				required:true
			},
            depth:{
				required:true
			},
            weight:{
				required:true
			},
            warranty:{
				required:true
			},
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	// Add State Validation
    $("#add_state").validate({
		rules:{
			name:{
				required:true
			},
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Edit State Validation
    $("#edit_state").validate({
		rules:{
			name:{
				required:true
			},
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Add City Validation
    $("#add_city").validate({
		rules:{
			name:{
				required:true
			},
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Edit City Validation
    $("#edit_city").validate({
		rules:{
			name:{
				required:true
			},
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Add State Validation
    $("#add_area").validate({
		rules:{
			name:{
				required:true
			},
			pincode:{
				required:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	// Edit State Validation
    $("#edit_area").validate({
		rules:{
			name:{
				required:true
			},
			pincode:{
				required:true,
			},
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$(document).on('click','.deleteRecord',function(e){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
			title: "Are you sure?",
			text: "You will not be able to recover this imaginary file!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonClass: "btn-danger",
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, cancel plx!",
			closeOnConfirm: false,
			closeOnCancel: false
		  },
		  function(isConfirm){
			if (isConfirm) {
			  swal("Deleted!", "Your imaginary file has been deleted.", "success");
			  window.location.href="/admin/"+deleteFunction+"/"+id;
			} else {
			  swal("Cancelled", "Your imaginary file is safe :)", "error");
			}
		  });
	});
	
	$(document).ready(function() {
		// show the alert
		setTimeout(function() {
			$(".alert-success").alert('close');
		}, 3000);
	});
	$(document).ready(function() {
		// show the alert
		setTimeout(function() {
			$(".alert-error").alert('close');
		}, 3000);
	});

	$(document).ready(function(){
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button //Add button selector');
		var wrapper = $('.field_wrapper //Input field wrapper');
		var fieldHTML = '<div><label class="control-label"></label><input type="text" name="ram[]" id="ram" placeholder="RAM" style="width:120px; margin-right:3px; margin-top:3px;"><input type="text" name="storage[]" id="storage" placeholder="Storage" style="width:120px;margin-right:3px; margin-top:3px;"><input type="text" name="color[]" id="color" placeholder="Color" style="width:120px;margin-right:3px;margin-top:3px;"><input type="text" name="price[]" id="price" placeholder="Price" style="width:120px; margin-right:3px; margin-top:3px;"><input type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px; margin-right:3px; margin-top:3px;"><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
		var x = 1; //Initial field counter is 1
		
		//Once add button is clicked
		$(addButton).click(function(){
			//Check maximum number of input fields
			if(x < maxField){ 
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); //Add field html
			}
		});
		
		//Once remove button is clicked
		$(wrapper).on('click', '.remove_button', function(e){
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});
});


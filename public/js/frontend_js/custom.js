// JavaScript Document
$(function() {
 "use strict";

  function responsive_dropdown () {
    /* ---- For Mobile Menu Dropdown JS Start ---- */
      $("#menu span.opener, #menu-main span.opener").on("click", function(){
          var menuopener = $(this);
          if (menuopener.hasClass("plus")) {
             menuopener.parent().find('.mobile-sub-menu').slideDown();
             menuopener.removeClass('plus');
             menuopener.addClass('minus');
          }
          else
          {
             menuopener.parent().find('.mobile-sub-menu').slideUp();
             menuopener.removeClass('minus');
             menuopener.addClass('plus');
          }
          return false;
      });

      jQuery( ".mobilemenu" ).on("click", function() {
        jQuery( ".mobilemenu-content" ).slideToggle();
        if ($(this).hasClass("openmenu")) {
            $(this).removeClass('openmenu');
            $(this).addClass('closemenu');
          }
          else
          {
            $(this).removeClass('closemenu');
            $(this).addClass('openmenu');
          }
          return false;
      });
    /* ---- For Mobile Menu Dropdown JS End ---- */

    /* ---- For Sidebar JS Start ---- */
      $('.sidebar-box span.opener').on("click", function(){
      
        if ($(this).hasClass("plus")) {
          $(this).parent().find('.sidebar-contant').slideDown();
          $(this).removeClass('plus');
          $(this).addClass('minus');
        }
        else
        {
          $(this).parent().find('.sidebar-contant').slideUp();
          $(this).removeClass('minus');
          $(this).addClass('plus');
        }
        return false;
      });
    /* ---- For Sidebar JS End ---- */

    /* ---- For Footer JS Start ---- */
      $('.footer-static-block span.opener').on("click", function(){
      
        if ($(this).hasClass("plus")) {
          $(this).parent().find('.footer-block-contant').slideDown();
          $(this).removeClass('plus');
          $(this).addClass('minus');
        }
        else
        {
          $(this).parent().find('.footer-block-contant').slideUp();
          $(this).removeClass('minus');
          $(this).addClass('plus');
        }
        return false;
      });
    /* ---- For Footer JS End ---- */

     /* ---- For Navbar JS Start ---- */
    $('.navbar-toggle').on("click", function(){
      var menu_id = $('#menu');
      var nav_icon = $('.navbar-toggle i');
      if(menu_id.hasClass('menu-open')){
        menu_id.removeClass('menu-open');
        nav_icon.removeClass('fa-close');
        nav_icon.addClass('fa-bars');
      }else{
        menu_id.addClass('menu-open');
        nav_icon.addClass('fa-close');
        nav_icon.removeClass('fa-bars');
      }
      return false;
    });
    /* ---- For Navbar JS End ---- */

    /* ---- For Category Dropdown JS Start ---- */
    $('.btn-sidebar-menu-dropdown').on("click", function() {
      $('.cat-dropdown').slideToggle();
    });
    /* ---- For Category Dropdown JS End ---- */

    /* ---- For Content Dropdown JS Start ---- */
    $('.content-link').on("click", function() {
      $('.content-dropdown').toggle();
    });
    /* ---- For Content Dropdown JS End ---- */
  }

  function popup_dropdown () {
    /*---- Category dropdown start ---- */
      $('.cate-inner span.opener').on("click", function(){
      
        if ($(this).hasClass("plus")) {
          $(this).parent().find('.mega-sub-menu').slideDown();
          $(this).removeClass('plus');
          $(this).addClass('minus');
        }
        else
        {
          $(this).parent().find('.mega-sub-menu').slideUp();
          $(this).removeClass('minus');
          $(this).addClass('plus');
        }
        return false;
      });
    /*---- Category dropdown end ---- */
  }

  function popup_links() {
    /*---- Start Popup Links---- */
    $('.popup-with-form').magnificPopup({
      type: 'inline',
      preloader: false,
      focus: '#name',

      // When elemened is focused, some mobile browsers in some cases zoom in
      // It looks not nice, so we disable it:
      callbacks: {
        beforeOpen: function() {
          if($(window).width() < 700) {
            this.st.focus = false;
          } else {
            this.st.focus = '#name';
          }
        }
      }
    });
    /*---- End Popup Links ---- */
    return false;
  }

  function owlcarousel_slider () {
    /* ------------ OWL Slider Start  ------------- */

      /* ----- pro_cat_slider Start  ------ */
      $('.pro-cat-slider').owlCarousel({
        items: 6,
        nav: true,
        dots: false,
        loop:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
            },
            768:{
                items:3,
            },
            992:{
                items:4,
            },
            1770:{
                items:6,
            }
        }
      });
      /* ----- pro_cat_slider End  ------ */

      /* ----- sub_menu_slider Start  ------ */
      $('.sub_menu_slider').owlCarousel({
        items: 1,
        nav: true,
        dots: false,
        loop:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            }
        }
      });
      /* -----sub_menu_slider End  ------ */

      /* ----- our-sell-pro_slider Start  ------ */
      $('#top-cat-pro').owlCarousel({
        items: 5,
        nav: true,
        dots: false,
        loop:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            460:{
                items:2,
            },
            768:{
                items:3,
            },
            1200:{
                items:4,
            },
            1770:{
                items:5,
            }
        }
      });
      /* ----- our-sell-pro_slider End  ------ */

      /* ----- best-seller-pro Start  ------ */
      $('.best-seller-pro').owlCarousel({
        items: 3,
        nav: true,
        dots: false,
        loop:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
            },
            768:{
                items:1,
            },
            992:{
                items:2,
            },
            1770:{
                items:3,
            }
        }

      });
      /* ----- best-seller-pro End  ------ */

      /* ----- daily-deals Start  ------ */
      $('#daily_deals').owlCarousel({
        items: 3,
        nav: true,
        dots: false,
        loop:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            501:{
                items:2,
            },
            768:{
                items:1,
            },
            992:{
                items:2,
            },
            1770:{
                items:3,
            }
        }
      });
      /* ----- daily-deals End  ------ */

      /* ----- brand-logo Start  ------ */
      $('#brand-logo').owlCarousel({
        items: 6,
        nav: true,
        dots: false,
        loop:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            501:{
                items:2,
            },
            992:{
                items:3,
            },
            1200:{
                items:4,
            },
            1770:{
                items:6,
            }
        }
      });
      /* ----- brand-logo End  ------ */

      /* ----- blog Start  ------ */
      $('#blog').owlCarousel({
        items: 4,
        nav: true,
        dots: false,
        loop:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            768:{
                items:2,
            },
            1200:{
                items:3,
            },
            1770:{
                items:4,
            }
        }
      });
      /* ----- blog End  ------ */

      /* -----  our-team slider Start  ------ */
      $('.our-team').owlCarousel({
        items: 6,
        nav: true,
        dots: false,
        loop:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
            },
            768:{
                items:2,
            },
            992:{
                items:3,
            },
            1200:{
                items:4,
            },
            1770:{
                items:6,
            }
        }
      });
      /* ----- our-team slider End  ------ */

      /* ---- main-banner Testimonial Start ---- */
      $(".main-banner, #client").owlCarousel({
     
        //navigation : true,  Show next and prev buttons
        items: 1,
        nav: true,
        slideSpeed : 300,
        paginationSpeed : 400,
        loop:true,
        autoPlay: false,
        autoplayTimeout:1000,
        dots: true,
        singleItem:true,
        lazyLoad:true,
        margin:10,
        autoHeight:true,
        merge:true,
        video:true,
        nav:true
      });
      /* ----- main-banner Testimonial End  ------ */

      return false;
    /* ------------ OWL Slider End  ------------- */
  }

  function setminheight() {
    $( ".banner-video" ).css("height",$(".banner-1").height() );
  }

  function scrolltop_arrow () {
   /* ---- Page Scrollup JS Start ---- */
   //When distance from top = 250px fade button in/out
    var scrollup = $('.scrollup');
    var headertag = $('header');
    var mainfix = $('.main');
    $(window).scroll(function(){
      if ($(this).scrollTop() > 0) {
          scrollup.fadeIn(300);
      } else {
          scrollup.fadeOut(300);
      }

      /* ---- Page Scrollup JS End ---- */
    });
    
    //On click scroll to top of page t = 1000ms
    scrollup.on("click", function(){
        $("html, body").animate({ scrollTop: 0 }, 1000);
        return false;
    });
  }

  function custom_tab() {
    /* ------------ Account Tab JS Start ------------ */
    $('.account-tab-stap').on('click', 'li', function() {
        $('.account-tab-stap li').removeClass('active');
        $(this).addClass('active');
        
        $(".account-content").fadeOut();
        var currentLiID = $(this).attr('id');
        $("#data-"+currentLiID).fadeIn();
        return false;
    });
    /* ------------ Account Tab JS End ------------ */
  }

  /* Price-range Js Start */
  function price_range () {
      $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 1800,
        values: [ 0, 500 ],
        slide: function( event, ui ) {
          $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
      });
      $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  }
  /* Price-range Js End */

  /*Select Menu Js Start*/
  function option_drop() {
    $( ".option-drop" ).selectmenu();
    return false;
  }
  /*Select Menu Js Ends*/

  /*countdown-clock Js Start*/
  function countdown_clock() {
    $('.countdown-clock').downCount({
      date: '03/04/2022 11:39:00',
          offset: +10
      }, 
      function () {
        //alert('done!'); Finish Time limit
      return false;
    });
  }
  /*countdown-clock Js End*/

  /* Product Detail Page Tab JS Start */
  function description_tab () {
    $("#tabs li a").on("click", function(e){
      var title = $(e.currentTarget).attr("title");
      $("#tabs li a , .tab_content li div").removeClass("selected");
      $(".tab-"+title +", .items-"+title).addClass("selected");
      $("#items").attr("class","tab-"+title);

      return false;
    });
  }
  /* Product Detail Page Tab JS End */


  function location_page () {
    // Animate loader off screen
    var url = (window.location.href);
    var stepid = url.substr(url.indexOf("#") + 1);

    if($("ul").hasClass("account-tab-stap") && (window.location.hash) ) {
      if($("#"+stepid).length){
        $(".account-tab-stap li").removeClass("active");
        $("#"+stepid).addClass("active");

        if($("#data-"+stepid).length){
          $(".account-content").css("display","none");
          $("#data-"+stepid).css("display","block");
        }
      }
    }
    
  }


  $(document).on("ready", function() {
    owlcarousel_slider(); setminheight(); price_range (); responsive_dropdown(); description_tab (); custom_tab (); scrolltop_arrow (); popup_dropdown (); countdown_clock(); option_drop(); popup_links(); location_page ();
  });
});

  $( window ).on( "load", function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
  });

  //btn click print
  function printDiv(divName) {
   var printContents = document.getElementById(divName).innerHTML;
   var originalContents = document.body.innerHTML;
   document.body.innerHTML = printContents;
   window.print();
   document.body.innerHTML = originalContents;
   return false;
  }

  function catstock()
  {
    var stock = $(".selectpicker").val();
    $.ajax({
      type: "get",
      url: "/get-product-stock",
      data: "idColor="+stock,
      cache: false,
      success: function(resp)
      {
        if(resp>0){
          $("#cartButton").show();
          $("#Availability").text("In Stock");
        }else{
          $("#cartButton").hide();
          $('#go_cart').hide();
          swal("", "This Product is Out of Stock Please Select Another Varient")
          document.getElementById('Availability').innerText= "Out Of Stock";
      }
      },error:function(){
        alert("Error")
      }
    });

  }  

  function catramrom()
  {
    var ramrom = $(".selectpicker").val();
    $.ajax({
      type: "get",
      url: "/get-product-ramrom",
      data: "idColor="+ramrom,
      cache: false,
      success: function(resp)
      {
        $("#ramrom").html(resp);
      },error:function(){
        alert("Error")
      }
    });
  }  


var setPrice = $('#forPrice').val(); 
$("#getPrice").html("RS."+setPrice);
function catchange()
{
  var priceAll = $(".selectpicker").val();
  if(priceAll != ""){
    $.ajax({
      type: "get",
      url: "/get-product-color",
      data: "idColor="+priceAll,
      cache: false,
      success: function(resp)
      {
        // alert(resp.price);
        $("#getPrice").html("RS."+resp.price);
        $('#price').val(resp.price);
      },error:function(){
        alert("Error")
      }
    });
  }
}

$().ready(function(){
  // Validate Register Form on keyup and submit 
  $('#registerForm').validate({
    rules:{
      name:{
        required:true,
        minlength:2,
        accept:"[a-zA-Z]+"
      },
      mobile:{
        required:true,
        minlength:9,
        maxlength:10,
        number: true
      },
      password:{
        required:true,
        minlength:6
      },
      password_confirm: {
        required: true,
        minlength: 5,
        equalTo: "#password"
      },
      email:{
        email:true,
      },
    },
    messages:{
      name:{
        required:"Please Enter your Name",
        minlength:"Your Name must be atleast 2 characters long",
        accept:"Your Name must contain letters only"
      },
      password:{
        required:"Please Enter your password",
        minlength:"Your Password must be atleast 6 characters long"
      },
      mobile:{
        required:"Please Enter your mobile number",
        minlength:"Your Mobile Number must be atleast 9 digits long",
        maxlength:"Your Mobile Number must be atleast 10 digits long"
      },
      email:{
        email:"Please Enter valid Email",
      },
      password_confirm:{
        required:"Enter Confirm Password",
        equalTo:"Password and Confirm Password do not match"
      }
    },
    highlight: function (element) {
      $(element).parent().addClass('error')
    },
    unhighlight: function (element) {
        $(element).parent().removeClass('error')
    }
  });

  // Validate Login Form on keyup and submit 
  $('#loginForm').validate({
    rules:{
      mobile:{
        required:true,
        minlength:9,
        maxlength:10,
        number: true
      },
      password:{
        required:true,
        minlength:6
      },
      email:{
        email:true,
        required:true
      },
    },
    messages:{
      password:{
        required:"Please Enter your password",
        minlength:"Your Password must be atleast 6 characters long"
      },
      mobile:{
        required:"Please Enter your mobile number",
        minlength:"Your Mobile Number must be atleast 9 digits long",
        maxlength:"Your Mobile Number must be atleast 10 digits long"
      },
      email:{
        email:"Please Enter valid Email",
        required:"Please enter your Email ID"
      },
    },
    highlight: function (element) {
      $(element).parent().addClass('error')
    },
    unhighlight: function (element) {
        $(element).parent().removeClass('error')
    }
  });

  $('#accountForm').validate({
    rules:{
      name:{
        required:true,
        minlength:2,
        accept:"[a-zA-Z]+"
      },
      mobile:{
        required:true,
        minlength:9,
        maxlength:10,
        number: true
      },
      email:{
        email:true
      },
    },
    messages:{
      name:{
        required:"Please Enter your Name",
        minlength:"Your Name must be atleast 2 characters long",
        accept:"Your Name must contain letters only"
      },
      mobile:{
        required:"Please Enter your mobile number",
        minlength:"Your Mobile Number must be atleast 9 digits long",
        maxlength:"Your Mobile Number must be atleast 10 digits long"
      },
      email:{
        email:"Please Enter valid Email"
      }
    },
    highlight: function (element) {
      $(element).parent().addClass('error')
    },
    unhighlight: function (element) {
        $(element).parent().removeClass('error')
    }
  });

  $('#passwordForm').validate({
    rules:{
      old_pass:{
        required:true,
        minlength:6
      },
      login_pass:{
        required:true,
        minlength:6
      },
      re_enter_pass:{
        required:true,
        minlength:6,
        equalTo:"#login_pass"
      }
    },
    messages:{
      password:{
        required:"Please Enter your password",
        minlength:"Your Old Password must be atleast 6 characters long"
      },
      login_pass:{
        required:"Please Enter your password",
        minlength:"Your New Password must be atleast 6 characters long"
      },
      re_enter_pass:{
        required:"Please Enter your password",
        minlength:"Your Confirm Password must be atleast 6 characters long"
      }
    },
    highlight: function (element) {
      $(element).parent().addClass('error')
    },
    unhighlight: function (element) {
        $(element).parent().removeClass('error')
    }
  });

  // Check Current User Password
  $('#old_pass').keyup(function(){
    var old_pass = $(this).val();
    $.ajax({
      headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/check-user-pwd',
      data:{old_pass:old_pass},
      success:function(resp){
        // alert(resp);
        if(resp=="false"){
          $('#chkpwd').html("<font color='red'>Current Password is Incorrect</font>");
        }else if(resp=="true"){
          $('#chkpwd').html("<font color='green'>Current Password is correct</font>");
        }
      },error:function(){
        alert("Error");
      }
    })
  });

  // Password Strength Script
  $("#password,#password_confirm").passtrength({
      minChars:4,
      passwordToggle:true,
      required:true,
      tooltip:true,
      eyeImg:"images/frontend_images/eye.svg"
    });  
});

$(document).ready(function() {
  // show the alert
  setTimeout(function() {
    $(".alert-success").alert('close');
  }, 5000);
});
$(document).ready(function() {
  // show the alert
  setTimeout(function() {
    $(".alert-error").alert('close');
  }, 5000);
});








<?php $url = url()->current(); ?> 
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
    <li <?php if(preg_match("/dashboard/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Company</span> <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/company/i",$url)){?> style="display:block;" <?php } ?>>
          <li <?php if(preg_match("/add-company/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/add-company') }}">Add Company</a></li>
          <li <?php if(preg_match("/view-company/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/view-company') }}">View Company</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>State</span> <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/state/i",$url)){?> style="display:block;" <?php } ?>>
          <li <?php if(preg_match("/add-state/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/add-state') }}">Add State</a></li>
          <li <?php if(preg_match("/view-state/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/view-state') }}">View State</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>City</span> <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/city/i",$url)){?> style="display:block;" <?php } ?>>
          <li <?php if(preg_match("/add-city/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/add-city') }}">Add City</a></li>
          <li <?php if(preg_match("/view-city/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/view-city') }}">View City</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Area</span> <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/area/i",$url)){?> style="display:block;" <?php } ?>>
          <li <?php if(preg_match("/add-area/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/add-area') }}">Add Area</a></li>
          <li <?php if(preg_match("/view-area/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/view-area') }}">View Area</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/category/i",$url)){?> style="display:block;" <?php } ?>>
          <li <?php if(preg_match("/add-category/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/add-category') }}">Add Category</a></li>
          <li <?php if(preg_match("/view-category/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/view-category') }}">View Category</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span> <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/product/i",$url)){?> style="display:block;" <?php } ?>>
          <li <?php if(preg_match("/add-product/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/add-product') }}">Add Product</a></li>
          <li <?php if(preg_match("/view-product/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/view-products') }}">View Products</a></li>
        </ul>
      </li>
     
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Orders</span> <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/order/i",$url)){?> style="display:block;" <?php } ?>>
          <li <?php if(preg_match("/view-order/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/view-orders') }}">View Orders</a></li>
          <li <?php if(preg_match("/cancel-order/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/cancel-orders') }}">Cancel Orders</a></li>
        </ul>
      </li>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Sales</span> <span class="label label-important">2</span></a>
        <ul <?php if(preg_match("/sales/i",$url)){?> style="display:block;" <?php } ?>>
          <li <?php if(preg_match("/view-sales/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/view-sales') }}">View Sales</a></li>
          <li <?php if(preg_match("/view-sales-return/i",$url)){?> class="active" <?php } ?>><a href="{{ url('/admin/view-sales-return') }}">Viee Sales Return</a></li>
        </ul>
      </li>
    
    </ul>
  </div>
  <!--sidebar-menu-->
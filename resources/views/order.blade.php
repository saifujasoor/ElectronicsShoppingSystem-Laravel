{% extends "layouts/FrontLayout/front_design.html" %}
{% load static %}
{% block content %}
<style type="text/css">
ol.progtrckr {
    margin: 0;
    padding: 0;
    list-style-type none;
}

ol.progtrckr li {
    display: inline-block;
    text-align: center;
    line-height: 3em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: green;
    height: 1.2em;
    width: 1.2em;
    line-height: 1.2em;
    border: none;
    border-radius: 1.2em;
}
ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 1.5em;
    bottom: -1.6em;
}
</style> 
<br>
<div class="account-content" data-temp="tabdata">
  <div id="form-print" class="admission-form-wrapper">
    <div class="row">
      <div class="col-12">
        <div class="mb-30">
          <h2 class="heading m-0" style="text-align: center;">My Orders</h2>
        </div>
      </div>
    </div>
    
    <div class="container">
      <div class="row">
        <div class="col-12 mb-xs-30">
          <div class="cart-item-table commun-table">
            <div class="table-responsive">
              {% for data in data %}
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="4"> 
                      <ul>
                        <li><span>Order placed</span> <span>{{data.order_date}}</span></li>
                        <li class="price-box"><span>Total</span> <span class="price">RS. {{data.amount}}</span></li>
                      </ul>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="4">
                      <ol class="progtrckr" data-progtrckr-steps="4">
                        {% if data.order_status == "Order Placed" %}
                          <li class="progtrckr-done">Order Placed</li><!--
                        --><li class="progtrckr-todo">Packed</li><!--
                        --><li class="progtrckr-todo">Out Of Delivery</li><!--
                        --><li class="progtrckr-todo">Delivered</li>
                        {% elif data.order_status == "Packed" %}
                          <li class="progtrckr-done">Order Placed</li><!--
                        --><li class="progtrckr-done">Packed</li><!--
                        --><li class="progtrckr-todo">Out Of Delivery</li><!--
                        --><li class="progtrckr-todo">Delivered</li>
                        {% elif data.order_status == "Out Of Delivery" %}
                          <li class="progtrckr-done">Order Placed</li><!--
                        --><li class="progtrckr-done">Packed</li><!--
                        --><li class="progtrckr-done">Out Of Delivery</li><!--
                        --><li class="progtrckr-todo">Delivered</li>
                        {% else %}
                          <li class="progtrckr-done">Order Placed</li><!--
                        --><li class="progtrckr-done">Packed</li><!--
                        --><li class="progtrckr-done">Out Of Delivery</li><!--
                        --><li class="progtrckr-done">Delivered</li>
                        {% endif %}
                      </ol>
                  </tr>
                  <tr>
                    {% if data.order_status == "Order Placed" or data.order_status == "Packed" or data.order_status == "Out Of Delivery" %}
                    <td>
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-4">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" onclick="show_order({{data.id}})" style="margin-top: 10px;margin-bottom: 10px;">Show Order Details</button>
                            <!-- <button class="btn btn-primary btn-block" onclick="show_order({{data.id}})">Show Order Details</button> -->
                          </div>
                          {% if data.cancle_flag == 1 %}
                            <div class="col-md-4">
                              <button class="btn btn-primary btn-block" disabled="" style="margin-top: 10px;margin-bottom: 10px;">Cancle Order</button>
                            </div>
                          {%else%}
                            <div class="col-md-4">
                              <button class="btn btn-primary btn-block" onclick="cancle_order({{data.id}})" id="cancled" style="margin-top: 10px;margin-bottom: 10px;">Cancle Order</button>
                            </div>
                          {%endif%}
                          <div class="col-md-4">
                            <a href="{% url 'invoice' data.id %}" class="btn btn-primary btn-block" style="margin-top: 10px;margin-bottom: 10px;">Invoice</a>
                            <!-- <button class="btn btn-primary btn-block" >Invoice</button> -->
                          </div>
                        </div>
                      </div>
                    </td>
                    {% else %}
                    <td>
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="show_order({{data.id}})" style="margin-top: 10px;margin-bottom: 10px;">Show Order Details</button>
                          </div>
                          <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="show_return_order({{data.id}})" style="margin-top: 10px;margin-bottom: 10px;">Return Product Details</button>
                          </div>
                          <div class="col-md-4">
                            <a href="{% url 'invoice' data.id %}" class="btn btn-primary btn-block" style="margin-top: 10px;margin-bottom: 10px;">Invoice</a>
                          </div>
                        </div>
                      </div>
                    </td>
                    {%endif%}
                  </tr>
                </tbody>
              </table>
              <br>
              {% endfor %}
            </div>
          </div>
        </div>
      </div>
     </div>
  </div>

</div>
<div class="modal fade" id="show_details" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid" id="show_order_details">
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="show_return_details" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Return Product Details</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid" id="show_retunr_order_details">
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function show_order(id) {
    $.ajax({
        type: "GET",
        url:"{% url 'order_details' %}",
        data:{id:id},
        success: function(data){
          $('#show_details').modal("show");
          $('#show_order_details').html(data);
        }
    });
  }
  function cancle_order(id)
  {
    swal({
        title: "Are you sure ?",
        text: "Cancle your Order",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, Cancle it",
        cancelButtonText: "No, cancel",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          swal("Deleted!", "Your Order has Cancle.", "success");
          $.ajax({
            type: "GET",
            url:"{% url 'cancle_orders' %}",
            data:{id:id},
            success: function(data){
              if(data=="Success")
              {
                location.reload();
                //document.getElementById('cancled').disabled=true;
              }
            }
          });
        } 
        else {
          swal("Cancelled", "Your data is safe :)", "error");
        }
      });
    } 
    function show_return_order(id)
    {
      $.ajax({
        type: "GET",
        url:"{% url 'sales_return_details' %}",
        data:{id:id},
        success: function(data){
          $('#show_return_details').modal("show");
          $('#show_retunr_order_details').html(data);
        }
      });
    }
</script>
{% endblock %}
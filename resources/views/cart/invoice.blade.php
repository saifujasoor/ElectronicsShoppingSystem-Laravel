<?php
use App\Http\Controllers\Controller;
$companies = Controller::companies();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="style.css" media="all" />
    <style>
        body{
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div class="header">
        <h1 style="text-align: center; font-size:40px;">Invoice</h5>
      </div>
      <div id="company" class="clearfix">
        @foreach ($companies as $comp)
          <h3 style="margin:none;">{{$comp->name}}</h3>
          <div>{{$comp->address}}</div>
          <div>{{$comp->mobile}}</div>
          <div>{{$comp->email}}</div>
        @endforeach
        <hr>
      </div>
      <table>
        <thead>
          <tr>
            <th class="service" style="text-align: left;width: 400px;"><h3 style="margin-bottom:none;">Shipped To:</h3></th>
            <th class="desc" style="text-align: left;width: 400px;"><h3 style="margin-bottom:none;">Billed To:</h3></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($addressdetails as $address)
            @php
                $data = \App\Area::where('id','=',$address->area_id)->first();
            @endphp
            <td>
                {{$address->customer_name}}<br>{{$address->address}},<br> {{$address->landmark}}<br>{{$address->email}}<br>{{$data->name}} - {{$data->pincode}}<br> India
                <?php
                  break;
                ?>
            </td>
            @endforeach
            @foreach ($orderdetails as $order)
            @php
              $data1 = \App\Area::where('id','=',$order->area_id)->first();
            @endphp
            <td>
                {{$order->customer_name}} <br>{{$order->address}},<br> {{$order->landmark}}<br>{{$order->email}}<br>{{$data1->name}} - {{$data1->pincode}} <br> India
                <?php
                  break;
                ?>
            </td>
            @endforeach
        </tr>
        </tbody>
      </table>
      <table>
        <thead>
          <tr>
            <th class="service" style="text-align: left;width: 400px;"><h3 style="margin-bottom:none;">Payment Method:</h3></th>
            <th class="desc" style="text-align: left;width: 400px;"><h3 style="margin-bottom:none;">Order Date:</h3></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
                COD
            </td>
            @foreach ($orderdetails as $order)
            <td>
                {{$order->created_at}}
                <?php
                  break;
                ?>
            </td>
            @endforeach
        </tr>
        </tbody>
      </table>
    </header>
    <main>
      <h3>Order Summary:  </h3>
      <table style="border: 1px solid;">
        <thead>
          <tr>
            <th class="service" style="background-color: #ddd; width:70px;padding:6px;">No</th>
            <th class="desc" style="background-color: #ddd;width:260px;padding:6px;">Product Name</th>
            <th style="background-color: #ddd;width:120px;padding:6px;">Price</th>
            <th style="background-color: #ddd;width:70px;padding:6px;">Qty</th>
            <th style="background-color: #ddd;width:110px;padding:6px;">Total</th>
          </tr>
        </thead>
        <tbody>
          @php
            $i=1;
          @endphp
          @foreach ($orderdetails as $order)
          <tr>
            <td class="service" style="text-align: center;">{{$i}}</td>
            <td class="desc">{{$order->product_name}} ({{$order->ram}},{{$order->storage}})</td>
            <td class="unit" style="text-align: center;">RS. {{$order->price}}</td>
            <td class="qty" style="text-align: center;">{{$order->qty}}</td>
            <td class="total" style="text-align: center;">RS. {{$order->qty* $order->price}}</td>
          </tr>
          @php
              $i++;
          @endphp
          @endforeach
        </tbody>
      </table>
      <?php $Subtotal = 0; ?>
      @foreach ($orderdetails as $order)
      <?php $Subtotal = $Subtotal + ($order->price * $order->qty); ?>
      @endforeach
      <div>
        <div class="subtotal" style="text-align: right;margin:20px 0px 3px 0px;">
          <span style="margin-right:100px; font-weight:bold;">Subtotal</span><span>RS. {{ $Subtotal }}</span>
        </div>
        <div class="charges" style="text-align: right;right;margin:0px 0px 3px 0px;">
          <span style="margin-right:39px;font-weight: bold;">Shipping Charges (+)</span><span>RS. 0</span>
        </div>
        <div class="grandtotal" style="text-align: right; right;margin:0px 0px 3px 0px;">
          <span style="margin-right:75px;font-weight:bold;">Grand Total</span><span>RS. {{ $Subtotal }}</span>
        </div>
      </div>
    </main>
  </body>
</html>
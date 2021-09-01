<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function viewSales(){
        $salesorder = \DB::table('orders')
            ->join('products_attributes','orders.pro_attribute_id', '=', 'products_attributes.id')
            ->join('products','products_attributes.product_id', '=', 'products.id')
            ->select('products_attributes.ram','products_attributes.storage','products_attributes.color','products_attributes.price','orders.*','products.product_name','products.image')
            ->orderBy('orders.created_at', 'desc')
            ->where('orders.order_status','=','Order Delivered')
            ->get();

        return view('admin.sales.view_sales')->with(compact('salesorder'));
    }
}

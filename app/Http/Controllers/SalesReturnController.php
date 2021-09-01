<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesReturn;

class SalesReturnController extends Controller
{
    public function viewSalesReturn(){
        $salesreturn = \DB::table('sales_returns')
            ->join('sales','sales_returns.sales_id','=','sales.id')
            
            ->join('orders','sales_returns.pro_attribute_id', '=', 'orders.pro_attribute_id')
            ->join('products_attributes','orders.pro_attribute_id', '=', 'products_attributes.id')
            ->join('products','products_attributes.product_id', '=', 'products.id')
            ->select('products_attributes.ram','products_attributes.storage','products_attributes.color','products_attributes.price','products.product_name','products.image','sales_returns.*','orders.*')
            ->orderBy('sales_returns.created_at', 'desc')
            ->get();

        return view('admin.sales.view_sales_return')->with(compact('salesreturn'));
    }
}

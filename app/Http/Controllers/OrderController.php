<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Area;
use App\DeliveryAddress;
use App\City;
use App\Order;
use App\State;
use App\Sales;
use App\SalesReturn;
use App\ProductsAttribute;
use PDF;
use Auth;

class OrderController extends Controller
{
    public function checkout(){
        $areas = Area::get();
        $deliveryAddress = deliveryAddress::where('user_id',Auth::User()->id)->orderBy('flag', 'DESC')->get();
        return view('cart.checkout')->with(compact('deliveryAddress','areas'));
    }

    public function getAddress(Request $req, $id=NULL){
        $id = $req->get('id');
        $addressDetails = DeliveryAddress::where(['id'=>$id])->first();
        $areas = Area::get();
        $areadata = Area::where('id',$addressDetails->area_id)->first();
        $citiesdata = City::where('id',$areadata->city_id)->first();
        $addstates = State::where('id',$citiesdata->state_id)->first();
        return view('cart.billing_address')->with(compact('addressDetails','areas','areadata','citiesdata','addstates'));
    }

    public function myOrder(){
        $user_id = Auth::user()->id;

        $orderdata = \DB::table('orders')
        ->join('products_attributes','orders.pro_attribute_id', '=', 'products_attributes.id')
        ->join('products','products_attributes.product_id', '=', 'products.id')
        ->select('products_attributes.ram','products_attributes.storage','products_attributes.color','products_attributes.price','orders.*','products.product_name','products.image')
        // ->groupBy(\DB::raw('orders.flag'))
        ->where(['user_id'=>$user_id])
        ->orderBy('orders.created_at', 'desc')
        ->paginate(3);

        return view('cart.order_details')->with(compact('orderdata'));
    }

    public function PDFInvoice(Request $req, $id=NULL){
        $user_id = Auth::user()->id;
        $invoiceDetails = Order::where(['id'=>$id])->first();
        // $orderdata = Order::where('flag',$invoiceDetails->flag)->get();
        $orderdetails = \DB::table('orders')
            ->join('products_attributes','orders.pro_attribute_id', '=', 'products_attributes.id')
            ->join('products','products_attributes.product_id', '=', 'products.id')
            ->select('products_attributes.ram','products_attributes.storage','products_attributes.color','products_attributes.price','orders.*','products.product_name','products.image')
            ->where('user_id',$user_id)
            ->where('flag',$invoiceDetails->flag)
            ->get();
        $addressdetails = \DB::table('orders')
            ->join('delivery_addresses','orders.delivery_address_id', '=', 'delivery_addresses.id')
            ->select('delivery_addresses.*')
            ->where('orders.id',$invoiceDetails->id)
            ->get();
        // print_r($invoiceDetails->id);die;
        $pdf = PDF::loadView('cart.invoice',['orderdetails' => $orderdetails,'addressdetails' => $addressdetails]);

        return $pdf->stream();
    } 
    
    public function PDFInvoiceDownload(Request $req, $id=NULL){
        $user_id = Auth::user()->id;
        $invoiceDetails = Order::where(['id'=>$id])->first();
        // $orderdata = Order::where('flag',$invoiceDetails->flag)->get();
        $orderdetails = \DB::table('orders')
            ->join('products_attributes','orders.pro_attribute_id', '=', 'products_attributes.id')
            ->join('products','products_attributes.product_id', '=', 'products.id')
            ->select('products_attributes.ram','products_attributes.storage','products_attributes.color','products_attributes.price','orders.*','products.product_name','products.image')
            ->where('user_id',$user_id)
            ->where('flag',$invoiceDetails->flag)
            ->get();
        $addressdetails = \DB::table('orders')
            ->join('delivery_addresses','orders.delivery_address_id', '=', 'delivery_addresses.id')
            ->select('delivery_addresses.*')
            ->where('orders.id',$invoiceDetails->id)
            ->get();
        // print_r($invoiceDetails->id);die;
        $pdf = PDF::loadView('cart.invoice',['orderdetails' => $orderdetails,'addressdetails' => $addressdetails]);

        return $pdf->download();
    }  

    public function returnOrders(Request $req){
        $id = $req->get('id');
        // print_r($id);die;
        $reason = $req->get('reason');
        $salesdata = Sales::where('order_id',$id)->first();
        // print_r($salesdata->id);die;
        $orderdata = Order::where('id',$id)->first();
        $salesreturn = new SalesReturn;
        $salesreturn->reason = $reason; 
        $salesreturn->pro_attribute_id = $orderdata->pro_attribute_id;
        $salesreturn->sales_id = $salesdata->id;
        $salesreturn->user_id = Auth::user()->id; 
        $salesreturn->save();
        $prodata = ProductsAttribute::where('id',$orderdata->pro_attribute_id)->first();
        $prodata->stock = $prodata->stock + $orderdata->qty;
        $prodata->save();
        return ['Success'];
    }

    public function cancelOrders(Request $req, $id = NULL){
        $id = $req->get('id');
        $orderid = Order::where('id',$id)->first();
        // print_r($orderid->flag);die;
        $orderdata = Order::where('flag',$orderid->flag)->get();
        foreach ($orderdata as $orders) {
            $orderdata = Order::where('cancel_flag',0)
                    ->where('id',$orders->id)
                    ->update(['cancel_flag'=>1]);    
            $prodata = ProductsAttribute::where('id',$orders->pro_attribute_id)->first();
            $prodata->stock = $prodata->stock + $orders->qty;
            $prodata->save();
        }
        return ['Success'];
    }

    // Admin Methods
    public function viewOrders(){
        $orderdata = \DB::table('orders')
            ->join('products_attributes','orders.pro_attribute_id', '=', 'products_attributes.id')
            ->join('products','products_attributes.product_id', '=', 'products.id')
            ->select('products_attributes.ram','products_attributes.storage','products_attributes.color','products_attributes.price','orders.*','products.product_name','products.image')
            ->orderBy('orders.created_at', 'desc')
            ->where('order_status','!=','Order Delivered')
            ->where('cancel_flag',0)
            ->get();

        return view('admin.orders.view_orders')->with(compact('orderdata'));
    }

    public function editStatus(Request $req, $id=''){
        if($req->isMethod('post')){
            $data = $req->all();
            $orderdata = Order::where(['id'=>$id])->first();
            $orderdetails = Order::where('flag',$orderdata->flag)->get();
            //$orders = Order::where(['id'=>$id])->update(['order_status'=>$data['order_status']]);
            foreach ($orderdetails as $order) {
                $order->order_status = $data['order_status'];
                $order->save();
                if ($order->order_status=="Order Delivered") {
                    $sales = new Sales;
                    $sales->order_id = $order->id; 
                    $sales->save();
                }
            }
            return redirect('/admin/view-orders')->with('flash_message_success','Order Status has been updated successfully..!!');
        }
        $statusDetails = Order::where(['id'=>$id])->first();
        return view('admin.orders.edit_order_status')->with(compact('statusDetails')); 
    }

    public function OrderCancel(){
        $orderdata = \DB::table('orders')
            ->join('products_attributes','orders.pro_attribute_id', '=', 'products_attributes.id')
            ->join('products','products_attributes.product_id', '=', 'products.id')
            ->select('products_attributes.ram','products_attributes.storage','products_attributes.color','products_attributes.price','orders.*','products.product_name','products.image')
            ->orderBy('orders.created_at', 'desc')
            ->where('cancel_flag',1)
            ->get();

        return view('admin.orders.cancel_orders')->with(compact('orderdata'));
    }
}

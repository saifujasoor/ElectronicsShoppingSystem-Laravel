<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductsAttribute;
use App\User;
use App\DeliveryAddress;
use App\Cart;
use App\Order;
use Auth;

class CartController extends Controller
{
    public function addtoCart(Request $req){
        $data = $req->all();
        // echo "<pre>"; print_r($data);die;
        $proArr = $data['idColor'];
        $cart = new Cart;
        $cart->attribute_id = $proArr;
        $cart->qty = 1;
        $cart->user_id = Auth::user()->id;
        $cart->save();
        return ["success"]; 
    }

    public function showCart(){
        $user_id = Auth::user()->id;

        $cartdata = \DB::table('carts')
        ->join('products_attributes', 'carts.attribute_id', '=', 'products_attributes.id')
        ->join('products', 'products_attributes.product_id', '=', 'products.id')
        ->select('products_attributes.ram','products_attributes.storage','products_attributes.color','products_attributes.price','products_attributes.stock','carts.*','products.product_name','products.image')
        ->where(['user_id'=>$user_id])
        ->get();

        $amount = 0;
        foreach ($cartdata as $cartdata1) {
            $amount = $amount + $cartdata1->price;
        }
        if ($amount > 0) {
            $totalamount = $amount;
        } else {
            $totalamount = 0;
        }

        return view('cart.shopping_cart')->with(compact('cartdata','amount','totalamount'));
    }

    public function deleteCartProduct($id = NULL){
        Cart::where(['id'=>$id])->delete();
        return redirect('/shopping-cart')->with('flash_message_success','Product has been deleted from cart!');
    }

    // Update Cart Product Quantity
    public function getQuantity(Request $req){
        $id = $req->get('id');
        $qtyupdate = $req->get('qtyupdate');
        $cartdata = Cart::where('id',$id)->first();
        // return [$cartdata->id];
        $prodata = ProductsAttribute::where('id',$cartdata->attribute_id)->first();
        
        if($prodata->stock >= $qtyupdate){
            Cart::where('id',$id)->update(['qty'=>$qtyupdate]);
            return ["Success"];
        }
		else if($prodata->stock == 1){
            return ["one"];
        }
		else{
            Cart::where('id',$id)->delete();
            return ["zero"];
        }
    }
    public function placeOrder(Request $req, $id=NULL){
        $user_id = Auth::user()->id;
        $id = $req->get('id');
        $check = $req->get('check');
        $number = mt_rand(1000000, 9999999);
        $placed = "Order Placed";
        $cartdata = \DB::table('carts')
        ->join('products_attributes', 'carts.attribute_id', '=', 'products_attributes.id')
        ->join('products', 'products_attributes.product_id', '=', 'products.id')
        ->select('products_attributes.ram','products_attributes.storage','products_attributes.color','products_attributes.price','products_attributes.stock','products_attributes.stock','carts.*','products.product_name','products.image')
        ->where(['user_id'=>$user_id])
        ->get();

        foreach ($cartdata as $cart) {
            if($check == '0'){
                $order = new Order;
                $order->customer_name = $req->get('name');
                $order->address = $req->get('address');
                $order->landmark = $req->get('landmark');
                $order->email = $req->get('email');
                $order->area_id = $req->get('area');
                $order->flag = $number;
                $order->contact_no = $req->get('contact');
                $order->pro_attribute_id = $cart->attribute_id;
                $order->amount = $req->get('price');
                $order->qty = $cart->qty;
                $order->order_status = $placed;
                $order->delivery_address_id = $req->get('id');
                $order->cancel_flag = 0;
                $order->user_id = $user_id;
                $order->save();
                $prodata = ProductsAttribute::where('id',$cart->attribute_id)->first();
                $prodata->stock = $prodata->stock - $cart->qty;
                $prodata->save();
                Cart::where('id',$cart->id)->delete();

            }else{
                $addressDetails = DeliveryAddress::where(['id'=>$id])->first();
                $order = new Order;
                $order->customer_name = $addressDetails->customer_name; 
                $order->address = $addressDetails->address; 
                $order->landmark = $addressDetails->landmark; 
                $order->email = $addressDetails->email; 
                $order->area_id = $addressDetails->area_id; 
                $order->flag = $number;
                $order->contact_no = $addressDetails->contact_no;
                $order->pro_attribute_id = $cart->attribute_id;
                $order->amount = $req->get('price');
                $order->delivery_address_id = $req->get('id');
                $order->qty = $cart->qty;
                $order->order_status = $placed;
                $order->cancel_flag = 0;
                $order->user_id = $user_id;
                $order->save();
                $prodata = ProductsAttribute::where('id',$cart->attribute_id)->first();
                $prodata->stock = $prodata->stock - $cart->qty;
                $prodata->save();
                Cart::where('id',$cart->id)->delete();
            }
        } 
    }
}


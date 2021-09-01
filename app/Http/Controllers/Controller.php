<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;
use App\Cart;
use App\Company;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function mainCategories(){
        $mainCategories = Category::where(['parent_id'=>0])->get();
        // echo "<pre>"; print_r($mainCategories);
        return $mainCategories;
    }

    public static function cartdata(){
        // $user_id = Auth::user()->id;

        $cartdata = \DB::table('carts')
        ->join('products_attributes', 'carts.attribute_id', '=', 'products_attributes.id')
        ->join('products', 'products_attributes.product_id', '=', 'products.id')
        ->select('products_attributes.ram','products_attributes.storage','products_attributes.color','products_attributes.price','products_attributes.stock','carts.*','products.product_name','products.image')
        // ->where(['user_id'=>$user_id])
        ->get();

        return $cartdata; 
    }
    public static function cartcount(){
        // $user_id = Auth::user()->id;

        $cartcount = \DB::table('carts')
        ->join('products_attributes', 'carts.attribute_id', '=', 'products_attributes.id')
        ->join('products', 'products_attributes.product_id', '=', 'products.id')
        ->select('products_attributes.ram','products_attributes.storage','products_attributes.color','products_attributes.price','products_attributes.stock','carts.*','products.product_name','products.image')
        // ->where(['user_id'=>$user_id])
        ->count();

        return $cartcount; 
    }

    public static function companies(){
        $companies = Company::all();
        return $companies;
    }

}


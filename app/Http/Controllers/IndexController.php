<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class IndexController extends Controller
{
    public function index(){

        // Ascending order (by default)
        $productsAll = Product::get();
        
        // In Descending order
        $productsAll = Product::orderBy('id','DESC')->get();

        // In Random order
        $productsAll = Product::inRandomOrder()->where('status',1)->get();

        // Get Product Details
        $productDetails = Product::get()->first();

        // Get All Categories and Sub Categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();     
        return view('index')->with(compact('productsAll','categories','productDetails'));
    }
}

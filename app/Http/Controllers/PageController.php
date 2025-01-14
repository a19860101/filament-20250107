<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class PageController extends Controller
{
    //
    public function index(){
        $products = Product::get();
        $products_feature = Product::where('status','hot')->limit(4)->get();
        $products_sale = Product::where('status','on sale')->limit(4)->get();
        return view('index',compact('products','products_feature','products_sale'));
    }
}

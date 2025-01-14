<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class PageController extends Controller
{
    //
    public function index(){
        $products = Product::get();
        $products_feature = Product::orderBy('id','DESC')->limit(4)->get();

        return view('index',compact('products','products_feature'));
    }
}

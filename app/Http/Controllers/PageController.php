<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class PageController extends Controller
{
    //
    public function index(){
        $categories = Category::get();
        $products = Product::get();
        $products_feature = Product::where('status','hot')->limit(4)->get();
        $products_sale = Product::where('status','on sale')->limit(4)->get();
        return view('index',compact('products','products_feature','products_sale','categories'));
    }

    public function show(Product $product){
        $categories = Category::get();
        return view('show',compact('product','categories'));
    }

    public function category_index($id){
        $categories = Category::get();
        $c = Category::find($id);
        // return $category->title;
        $products = Product::where('category_id',$id)->get();

        return view('category_index',compact('products','categories','c'));
    }
}

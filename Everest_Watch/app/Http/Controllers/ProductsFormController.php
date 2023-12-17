<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductsFormController extends Controller
{
    public function index(){
        return view('productsForm',['products' => Products::get()]);
    }
    public function store(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        $products = new Products;
        $products->name = $request['name'];
        $products->price = $request['price'];
        $products->quantity = $request['quantity'];
        // $products->gallery = $request->file('image')->getClientOriginalName();
        $image = $request->image;
        $name = $image->getClientOriginalName();
        $image->storeAs('public/images',$name);
        $products->gallery = $name;
        $products->brand = $request['brand'];
        $products->description = $request['description'];
        $products->save();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsFormController extends Controller
{
    public function index()
    {
        return view('productsForm', ['products' => Products::get()]);
    }
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        $products = new Products;
        $products->name = $request['name'];
        $products->price = $request['price'];
        $products->quantity = $request['quantity'];
        // $products->gallery = $request->file('image')->getClientOriginalName();
        $image = $request->image;
        $name = $image->getClientOriginalName();
        $image->storeAs('public/images', $name);
        $products->gallery = $name;
        $products->brand = $request['brand'];
        $products->description = $request['description'];
        $products->save();
        return redirect()->back()->with('success', 'Congratulation! New Product Listed Successfully');
    }
    public function UpdateProduct(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        $products = Products::find($request->input('id'));
        $products->name = $request['name'];
        $products->price = $request['price'];
        $products->quantity = $request['quantity'];
        // $products->gallery = $request->file('image')->getClientOriginalName();
        if ($request->file('image') != null) {
            $image = $request->image;
            $name = $image->getClientOriginalName();
            $image->storeAs('public/images', $name);
            $products->gallery = $name;
        }
        $products->brand = $request['brand'];
        $products->description = $request['description'];
        $products->save();
        return redirect()->back()->with('success', 'Congratulation!  Product Listing Updated Successfully');
    }

    public function deleteProduct($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Congratulation!  Product Listing Deleted Successfully');
    }
}

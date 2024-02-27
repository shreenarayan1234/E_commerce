<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Order;

use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        $data = Products::all();
        return view('products', ['product' => $data]); // Update variable name to 'products'
    }

    function detail($id)
    {
        $data = Products::find($id);
        return view('detail', ['product' => $data]);
    }

    function search(Request $req)
    {
        $data = Products::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return view('search', ['products' => $data]); // Update variable name to 'products'
    }

    function addToCart(Request $req)
    {
        if ($req->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id']; // Update to use 'id' instead of 'user_id'
            $cart->product_id = $req->product_id;
            $cart->quantity = $req->quantity;
            $cart->total_price = $req->total_price;
            $cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    static function cartItem()
    {
        $userId = Session::get('user')['id']; // Update to use 'id' instead of 'user_id'
        return Cart::where('user_id', $userId)->count();
    }

    function cartList()
    {
        $userId = Session::get('user')['id']; // Update to use 'id' instead of 'user_id'
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();

        return view('cartlist', ['products' => $products]); // Update variable name to 'products'
    }

    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow()
    {
        $userId = Session::get('user')['id']; // Update to use 'id' instead of 'user_id'
        $total = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->sum('products.price');

        return view('ordernow', ['total' => $total]); // Update variable name to 'total'
    }

    function orderPlace(Request $req)
    {
        $userId = Session::get('user')['id']; // Update to use 'id' instead of 'user_id'
        $allCart = Cart::where('user_id', $userId)->get();
        foreach ($allCart as $cart) {
            $order = new Order;
            $order->product_id = $cart->product_id; // Update to use '->' instead of ['']
            $order->user_id = $cart->user_id; // Update to use '->' instead of ['']
            $order->phone_no =$req->phone_no;
            $order->status = "pending";
            $order->payment_method = $req->payment;
            $order->payment_status = "Paid";
            $order->address = $req->address;
            $order->save();
        }
        Cart::where('user_id', $userId)->delete();
        $req->input();
        return redirect('/');
    }

    function myOrders()
    {
        $userId = Session::get('user')['id']; // Update to use 'id' instead of 'user_id'
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();

        return view('myorders', ['orders' => $orders]); // Update variable name to 'orders'
    }

    function ourwatch()
    {
        $data = Products::all();
        return view('ourwatch', ['product' => $data]);
    }
}

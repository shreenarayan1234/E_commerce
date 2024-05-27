<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Order;

class WebHookController extends Controller
{
    //
    public function paymentSuccess(Request $req){

    $userId = session()->get('user')['id']; // Changed to use 'id' instead of 'user_id'
    $allCart = Cart::where('user_id', $userId)->get();

    foreach ($allCart as $cart) {
        $order = new Order;
        $order->product_id = $cart->product_id; // Changed to use '->' instead of ['']
        $order->user_id = $userId; // Changed to use the $userId variable
        $order->phone_no = $req->phone_no;
        $order->status = "pending";
        $order->payment_method = $req->payment;
        $order->payment_status = "Paid";
        $order->address = $req->address;
        
        if ($order->save()) {
            foreach ($allCart as $item) { // Corrected variable name to $allCart
                $product = Products::find($item->product_id); // Assuming 'Products' is your model name
                $orderItem = new OrderItem();
                $orderItem->user_id = $userId; // Changed to use the $userId variable
                $orderItem->product_id = $item->product_id;
                $orderItem->quantity = $item->quantity;
                $orderItem->price = $product->price;
                $orderItem->order_id = $order->id;
                $orderItem->save();
                $item->delete();
            }
        }
    }
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


use Stripe;
use Session;

use App\Models\Cart;

class StripePaymentController extends Controller
{

   public function index()
   {
      return view('index');

   }

   public function success(){
        return view('success');
   }
   public function cancel(){
      return "Cancelled";
   }

   public function checkout(Request $request)
   {
       // Retrieve the authenticated user
       $user = Session::get('user');
   
       // Retrieve the cart items with product details from the database
       $cartItems = DB::table('cart')
           ->join('products', 'cart.product_id', '=', 'products.id')
           ->where('cart.user_id', $user->id)
           ->select('products.name', 'products.price', 'cart.quantity')
           ->get();
   
       // Initialize an empty array to store line items
       $lineItems = [];
   
       // Loop through each cart item to construct line items
       foreach ($cartItems as $cartItem) {
           // Construct line item for the current product
           $lineItem = [
               'price_data' => [
                   'currency' => 'usd',
                   'product_data' => [
                       'name' => $cartItem->name,
                   ],
                   'unit_amount' => $cartItem->price * 100, // Stripe requires the amount in cents
               ],
               'quantity' => $cartItem->quantity,
           ];
   
           $lineItems[] = $lineItem;
       }
   
       try {
           \Stripe\Stripe::setApiKey('sk_test_51Op2AFKXWPXp8lEKl0f59kay6lXNGwI6JcizUCvRymqcCBU7o6Tw17JBBcrJtR2ptpVh0hf1aZirxgjH5uLZZMQ300EloGflAv');
           $session = \Stripe\Checkout\Session::create([
               'payment_method_types' => ['card'],
               'line_items' => $lineItems,
               'mode' => 'payment',
               'success_url' => "http://127.0.0.1:8000/success",  // Replace with your actual success URL
               'cancel_url' => "http://127.0.0.1:8000/cancelled",  // Replace with your actual cancel URL
           ]);
           return redirect()->away($session->url);
       } catch (Exception $e) {
           return $e;
       }
   }

   public function webhook(Request $request){
      Log::info('webhooks called');
      return 'webhook called';
   }
   
}


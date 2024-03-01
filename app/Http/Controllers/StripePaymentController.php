<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StripePaymentController extends Controller
{

   public function index()
   {
      return view('index');

   }

   public function success(){
      return "Success";
   }
   public function cancel(){
      return "Cancelled";
   }

   public function checkout()
   {

      try{
      \Stripe\Stripe::setApiKey('sk_test_51Op2AFKXWPXp8lEKl0f59kay6lXNGwI6JcizUCvRymqcCBU7o6Tw17JBBcrJtR2ptpVh0hf1aZirxgjH5uLZZMQ300EloGflAv');
      $session = \Stripe\Checkout\Session::create([
         'payment_method_types' => ['card'],
         'line_items' => [
             [
                 'price_data' => [
                     'currency' => 'usd',
                     'product_data' => [
                         'name' => 'Your Product Name',  // Replace with your actual product name
                     ],
                     'unit_amount' => 500,  // Replace with the actual price in cents (e.g., $5.00 = 500 cents)
                 ],
                 'quantity' => 1,
             ],
         ],
         'mode' => 'payment',
         'success_url' => route('success'),  // Replace with your actual success URL
         'cancel_url' => route('cancelled'),  // Replace with your actual cancel URL
     ]);
     
      return redirect()->away($session->url);
   
   }catch(Exception $e){
      return $e;
   }
}

   public function test(){
      return 'Hello World';

   }

}


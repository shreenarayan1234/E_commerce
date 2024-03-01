<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\Exception\CardException;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment');
    }

    // public function payment(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'fullName' => 'required',
    //         'cardNumber' => 'required',
    //         'month' => 'required',
    //         'year' => 'required',
    //         'cvv' => 'required'
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->route('payment.index')->with('danger', $validator->errors()->first());
    //     }

    //     try {
    //         Stripe::setApiKey(env('STRIPE_SECRET'));

    //         $paymentIntent = \Stripe\PaymentIntent::create([
    //             'amount' => 2000,
    //             'currency' => 'usd',
    //             'payment_method_types' => ['card']
    //         ]);

    //         return redirect()->route('payment.index')->with('success', 'Payment completed.');
    //     } catch (CardException $e) {
    //         return redirect()->route('payment.index')->with('danger', $e->getError()->message);
    //     } catch (Exception $e) {
    //         return redirect()->route('payment.index')->with('danger', $e->getMessage());
    //     }
    // }
    public function payment(){
        echo "ad";
    }
}


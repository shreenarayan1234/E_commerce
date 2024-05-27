<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsFormController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\WebHookController;
use App\Http\Controllers\AdminController;
use App\Models\Products;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});
Route::view('/register','register');
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::get('/',[ProductController::class,'index']);
Route::get('/products',function(){
    $products = Products::all();
    echo "<pre>";
    print_r($products->toArray());
});

Route::get('detail/{id}',[ProductController::class,'detail']);
Route::get('search',[ProductController::class,'search']);
Route::post('add_to_cart',[ProductController::class,'addToCart']);
Route::get('cartlist',[ProductController::class,'cartList']);
Route::get('removecart/{id}',[ProductController::class,'removeCart']);
Route::get('ordernow',[ProductController::class,'orderNow']);
Route::post('orderplace',[ProductController::class,'orderPlace']);
Route::get('myorders',[ProductController::class,'myOrders']);

Route::get('/ourwatch',[ProductController::class,'ourwatch']);
Route::get('/aboutus', function(){
    return view('aboutus');
} );

Route::get('/upcomming', function(){
    return view('upcomming');
});


//Dashboard Work (BackEnd)

Route::get('/admin',[AdminController::class,'index']);
Route::get('/adminProducts',[AdminController::class,'products']);
Route::get('/ourCustomers',[AdminController::class,'customers']);
Route::get('/ourOrders',[AdminController::class,'orders']);
Route::get('/changeOrderStatus/{payment_status}/{id}',[AdminController::class,'changeOrderStatus']);
Route::get('/deleteProduct/{id}',[ProductsFormController::class,'deleteProduct']);
Route::get('/deleteUser/{id}',[AdminController::class,'deleteUser']);
Route::get('/productsform', [ProductsFormController::class,'index']);
Route::post('/productsform',[ProductsFormController::class,'store']); //Adding new products
Route::post('/UpdateProduct',[ProductsFormController::class,'UpdateProduct']); //Updating products


// Stripe Route

// Route::get('/paymentstripe', [PaymentController::class, 'index'])->name('payment.index');
// Route::post('/payment', [PaymentController::class, 'payment'])->name('payment.payment');

Route::post('/checkout',[StripePaymentController::class,'checkout']);
Route::post('/success',[StripePaymentController::class,'success'])->name('success');
Route::post('/cancelled',[StripePaymentController::class,'cancelled'])->name('cancelled');

Route::post('/webhook',[WebHookController::class,'paymentSuccess'])->name('webhook');

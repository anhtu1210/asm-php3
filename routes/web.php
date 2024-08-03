<?php


use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Models\ProductColor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// home
Auth::routes();
Route::get('/', [HomeController::class, 'showHome'])->name('home');

// cart
Route::get('cart', [CartController::class, 'list'])->name('cart.index');
Route::post('cart-add', [CartController::class, 'add'])->name('cart.add');
Route::patch('cart-update', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('cart-delete', [CartController::class, 'deleteCart'])->name('cart.delete');
Route::post('cart-discount', [CartController::class, 'discount'])->name('cart.discount');
// checkout
Route::get('cart-checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('order-save', [OrderController::class, 'save'])->name('order.save');

// product
Route::get('product/shop', [ProductController::class, 'index'])->name('product.index');
Route::get('product/{slug}/detail', [ProductController::class, 'detail'])->name('product.detail');


//payment
Route::post('payment', [PaymentController::class, 'payment'])->name('payment.payment');
Route::get('/vnpay-callback', [PaymentController::class, 'vnpayCallback'])->name('vnpay.callback');
// Route::get('/home', [HomeController::class, 'index'])->name('home');


// my order
Route::get('myorder', [OrderController::class, 'showOrder'])->name('myorder.showOrder');
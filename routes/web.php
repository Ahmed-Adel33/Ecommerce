<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[UserController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirect',[UserController::class,'redirect']);
Route::post('addCart/{id}',[UserController::class,'addCart']);
Route::get('showCart',[UserController::class,'showCart']);

Route::get('/deleteCart/{id}',[UserController::class,'destroy']);
Route::get('/editCart/{id}',[UserController::class,'editForm']);
Route::post('/editCart/{id}',[UserController::class,'edit']);
Route::post('confirm',[UserController::class,'confirm']);
Route::post('voucher',[UserController::class,'voucher']);
Route::post('remove',[UserController::class,'remove']);
Route::post('payment',[UserController::class,'payment']);
Route::post('pay',[UserController::class,'pay']);
Route::get('invoice',[UserController::class,'invoice']);
Route::get('order',[UserController::class,'order']);
Route::get('sms',[UserController::class,'sms']);
Route::get('review/{id}',[UserController::class,'reviewform']);
Route::post('review/{id}',[UserController::class,'review']);
//admin
Route::get('productForm',[AdminController::class,'ProductForm']);
Route::post('addProduct',[AdminController::class,'addProduct']);

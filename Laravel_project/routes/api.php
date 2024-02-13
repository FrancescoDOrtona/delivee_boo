<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\RestaurantController;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/restaurants', [RestaurantController::class, 'index']);

Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show']);

Route::post('/orders', [OrderController::class, 'store']);
// Route::get('/restaurants/filter', [RestaurantController::class, 'filter']);

// Route::get('/search',[RestaurantController::class,'search']);

Route::get('/orders/generate', [PaymentController::class, 'generate'])->name('order.make');
Route::post('/orders/makePayment', [PaymentController::class, 'makePayment'])->name('makePayment.make');

<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RollController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

//http://myapi.test/api/roll
Route::get('/roll',[RollController::class, 'index']);
//http://myapi.test/api/status
Route::get('/status',[RollController::class, 'status']);
//http://myapi.test/api/store
Route::get('/store',[RollController::class, 'store']);


//php artisan make:controller UserController
//CRUD for users
Route::get('/users',[UserController::class,'index'] );

Route::get('/users/{user}',[UserController::class,'show']);

Route::post('/users',[UserController::class,'store']);

Route::put('/users/{user}',[UserController::class,'update']);

Route::delete('/users/{user}',[UserController::class,'delete']);
/* Для Body
{
   "name": "Painter",
   "email": "paint@example.com"
}
*/
//php artisan make:controller ProductController
//CRUD for Products
Route::get('/products',[ProductController::class,'index'] );

Route::get('/products/{product}',[ProductController::class,'show'] );

Route::post('/products', [ProductController::class,'store'] );

Route::put('/products/{product}',[ProductController::class,'update'] );

Route::delete('/products/{product}',[ProductController::class,'delete'] );

/* 
{
   "name": "Painting",
   "description": "Very interesting thingk",
   "price": 199.99,
   "image": null,
   "stock": 10,
   "status": "avaliable"
}
*/

//CRUD for Order
Route::get('/orders',[OrderController::class,'index'] );

Route::get('/orders/{order}',[OrderController::class,'show'] );

Route::post('/orders',[OrderController::class,'store'] );

Route::put('/orders/{order}',[OrderController::class,'update'] );

Route::delete('/orders/{order}', [OrderController::class,'delete']);

/*
{
        "user_id": 2,
        "customer_name": "Regular User",
        "product_id": 2,
        "quantity": 1,
        "discount": 40,
        "status": "created",
        "payment_status": "pending",
        "shipping_status": "pending",
        "shipping_address": "Moscow, Kremlin"
}
*/
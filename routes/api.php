<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RollController;
use App\Http\Controllers\UserController;

//http://myapi.test/api/roll
Route::get('/roll',[RollController::class, 'index']);
//http://myapi.test/api/status
Route::get('/status',[RollController::class, 'status']);
//http://myapi.test/api/store
Route::get('/store',[RollController::class, 'store']);

//php artisan make:controller UserController
//http://myapi.test/api/users
Route::get('/users',[UserController::class,'index'] );
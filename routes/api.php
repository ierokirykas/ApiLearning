<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RollController;

//http://myapi.test/api/roll

Route::get('/roll',[RollController::class, 'index']);
//http://myapi.test/api/status
Route::get('/status',[RollController::class, 'status']);
//http://myapi.test/api/store
Route::get('/store',[RollController::class, 'store']);
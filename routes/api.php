<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products',[ProductController::class,'index']);
Route::post('/product',[ProductController::class,'create']);
Route::get('/product/{id}',[ProductController::class,'getProduct']);
Route::put('/product/{id}',[ProductController::class,'update']);
Route::delete('/product/{id}',[ProductController::class,'delete']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::post('/product',[ProductController::class,'create']);
Route::get('/product',[ProductController::class,'index']);

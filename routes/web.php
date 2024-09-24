<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::resource("category",CategoryController::class);
Route::resource("product",ProductController::class);

Route::get('/register', [AuthController::class,'index']);
Route::post('/register', [AuthController::class,'register']);

Route::get('/login', [AuthController::class,'register_view']);
Route::post('/login', [AuthController::class,'login']);

Route::get("/", [AuthController::class,"welcome"]);
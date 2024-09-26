<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\Authenticate;



Route::get('/register', [AuthController::class,'index']);
Route::post('/register', [AuthController::class,'register']);

Route::get('/login', [AuthController::class,'register_view']);
Route::post('/login', [AuthController::class,'login']);

Route::group(['middleware' => ['auth']], function (){
    Route::resource("category",CategoryController::class);
    Route::resource("product",ProductController::class);
    Route::post("/logout", [AuthController::class,'logout']);
});

// Route::get("logout", [AuthController::class,"logout"]);
Route::get("/", [AuthController::class,"welcome"]);

Route::get("/data", [IndexController::class,"index_for"]);
Route::get("/group", [IndexController::class,"group"]);
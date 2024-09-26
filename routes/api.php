<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\Authenticate;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');
// Route::resource("category",CategoryController::class)->Middleware([Authenticate::class]);
// Route::resource("product",ProductController::class)->middleware([Authenticate::class]);
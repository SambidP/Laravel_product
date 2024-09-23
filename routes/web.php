<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get("/", [CategoryController::class,"index"]);
Route::get("/create", [CategoryController::class,"create"]);
Route::get("/show", [CategoryController::class,"show"]);
Route::post("/store", [CategoryController::class,"store"]);
Route::get('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

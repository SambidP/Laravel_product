<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\ApiProductController;
use App\Http\Controllers\Api\V1\ApiCategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(
    ['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'],
    function () {
        Route::apiResource('customers', CustomerController::class)->middleware('auth:api');
        Route::apiResource('invoices', InvoiceController::class);
        Route::post('invoices/bulk', ['uses' => 'InvoiceController@bulkStore']);
        Route::apiResource('categories', ApiCategoryController::class)->middleware('auth:api');
        Route::apiResource('products', ApiProductController::class)->middleware('auth:api');
    }
);

Route::post('login', [ApiAuthController::class, 'login']);
Route::post('register', [ApiAuthController::class, 'register']);
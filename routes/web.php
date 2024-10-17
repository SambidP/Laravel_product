<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/register', [AuthController::class,'index']);
Route::post('/register', [AuthController::class,'register']);

Route::get('/login', [AuthController::class,'register_view']);
Route::post('/login', [AuthController::class,'login']);

Route::group(['middleware' => ['auth']], function (){
    Route::resource("category",CategoryController::class);
    Route::resource("product",ProductController::class);
    Route::post("/logout", [AuthController::class,'logout']);
});
Route::get("/", [AuthController::class,"welcome"]);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

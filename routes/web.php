<?php
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\{Route, Password, Hash};
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\{CategoryController, AuthController, ProductController};

//Welcome and Sign-in Pages
Route::get("/", [AuthController::class, "welcome"]);
Route::get('/register', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'register_view'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//Passing the Auth Middleware
Route::group(['middleware' => ['auth']], function () {
    Route::get('/category/trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::get('/dashboard', [CategoryController::class, 'dashboard']);
    Route::post("/logout", [AuthController::class, 'logout']);
    Route::post('/category/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');
    Route::delete('/category/{id}/delete-permanently', [CategoryController::class, 'deletePermanently'])->name('category.deletePermanently');
    Route::resource("category", CategoryController::class);
    Route::resource("product", ProductController::class);
});

//Passing the PermissionCheck Middleware
//can-create
Route::get('/category/create', [CategoryController::class, 'create'])->middleware('perms:can-create');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create')->middleware('perms:can-create');

//can-edit
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit')->middleware('perms:can-edit');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit')->middleware('perms:can-edit');

//can-delete
Route::delete('/category/{id}/delete-permanently', [CategoryController::class, 'deletePermanently'])
    ->name('category.deletePermanently')
    ->middleware('perms:can-delete');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('perms:can-delete');

//email-verification routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/category')->with('success', 'Email verification successful');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//forgot-password routes
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['success' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

//reset password routes
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('success', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

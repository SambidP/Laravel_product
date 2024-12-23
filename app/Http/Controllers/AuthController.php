<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Product};
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\{Hash,Auth};

class AuthController extends Controller{
public function register_view(){
    
    return view("auth.login");
    }
public function index(){
    return view('auth.register');
    }

public function welcome(){
    return view("welcome");
    }

public function register(Request $request)
    {
    $registerData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|confirmed',
    ]);

    $user = User::create([
        'name'=> $registerData['name'],
        'email'=> $registerData['email'],
        'password'=> Hash::make($registerData['password']),
    ]);
    event(new Registered($user));
    return redirect('/login')->with('success','User Registration Successful');  
    }
public function login(Request $request) 
    {
    $logInData = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    if (!Auth::attempt($logInData)) {
        session()->flash('error', 'Invalid credentials');
        return redirect()->back()->withInput();
    }
    else {
        $request->session()->regenerate();
    }
    $user = Auth::user(); 

    $accessToken = $user->createToken('authToken')->accessToken; 

    return redirect('/category')->with('success', 'User logged in successfully');
    }

public function logout(Request $request)
    {
    auth::guard('web')->logout();

    $request -> session()->invalidate();
    $request -> session() -> regenerateToken() ;

    return redirect('/')->with('success','User logged out successfully');
    }
    
    public function index_for(){
    return Product::get();
    }   
}

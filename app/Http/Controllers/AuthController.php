<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

        $accessToken = $user->createToken('authToken')->accessToken;

        return redirect('/login');  
}

public function login(Request $request){

    $logInData = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]); 

    if(!auth::attempt($logInData)){
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $user = Auth::user()->id;
    $users = User::find($user);
    $accessToken = $users->createToken('authToken')->accessToken;
    return redirect('/product');
}

public function logout(Request $request){
    auth::guard('web')->logout();

    $request -> session()->invalidate();
    $request -> session() -> regenerateToken() ;

    return redirect('/login');
    }
}

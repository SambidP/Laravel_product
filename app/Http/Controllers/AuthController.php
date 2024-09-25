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
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:20',
        ]);
        // dd($registerData);

        $user = User::create([
            'name'=> $registerData['name'],
            'email'=> $registerData['email'],
            'password'=> Hash::make($registerData['password']),
        ]);

        $accessToken = $user->createToken('authToken')->accessToken;
                
        // return response()->json([
        //     'user' => $user,
        //     'access_token' => $accessToken,
        // ], 201);
        return redirect('/login')->with('success', 'Registration successful!');  
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
    // dd($user);
    $users = User::find($user);
    $accessToken = $users->createToken('authToken')->accessToken;

    // return response()->json([
    //     'user' => $user,
    //     'access_token' => $accessToken,
    // ]);
    return redirect('/category')->with('success', 'Login successful!');
    
}
}


// public function login(Request $request){
//     // dd($request->all());
    
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|max:255',
//         'password' => 'required|string|max:20',
//     ]);

//     User::create([
//         "name" => $request->name,
//         "email"=> $request->email,
//         "password"=> $request->password,
//     ]);
//     return redirect("category");
// }
// public function register(Request $request){
//     // dd($request->all());
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|max:255',
//         'password' => 'required|string|max:20',
//     ]);

//     User::create([
//         "name" => $request->name,
//         "email"=> $request->email,
//         "password"=> $request->password,
//     ]);
//     return redirect("login");
// }


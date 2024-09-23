<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller{
public function register_view(){
    
    return view("auth.login");
}

public function index(){
    return view('auth.register');
}
public function login(Request $request){
    // dd($request->all());
    
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string|max:20',
    ]);

    User::create([
        "name" => $request->name,
        "email"=> $request->email,
        "password"=> $request->password,
    ]);
    return redirect("category");
}
public function register(Request $request){
    // dd($request->all());
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string|max:20',
    ]);

    User::create([
        "name" => $request->name,
        "email"=> $request->email,
        "password"=> $request->password,
    ]);
    return redirect("login");
}

public function welcome(){
    return view("welcome");
}

}



/**
 * Store a newly created resource in storage.
 */




// public function register(Request $request){
    //     return view("auth.register");
    // }
    // public function login(Request $request){
        
    //     User::create([
    //         "email"=> $request->email,
    //         "password"=> $request->password,
    //     ]);
    //     return redirect('/category')->with('status','Category Created Successfully');
    // }
    // public function login(Request $request){
//     User::create([
//         "name"=> $request->name,
//         "email"=> $request->email,
//         "password"=> $request->password,
//     ]);
//     return view("category.show");
// }
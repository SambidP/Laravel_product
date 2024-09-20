<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
    public function register(Request $request){
        return view("auth.register");
    }

    public function login(Request $request){
        User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> $request->password,
        ]);
        return view("category.show");
    }
}

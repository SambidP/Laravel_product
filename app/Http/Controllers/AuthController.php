<?php

namespace App\Http\Controllers;

use App\Models\{User,Product};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Hash,Auth};
use Illuminate\Auth\Events\Registered;

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
        event(new Registered($user));
        return redirect('/login')->with('success','User Registration Successful');  
}

public function login(Request $request){

    $logInData = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]); 

    if (!Auth::attempt($request->only('email', 'password'))) {
        session()->flash('error', 'Invalid credentials');
        return redirect()->back()->withInput();
    }
    $user = Auth::user()->id;
    $users = User::find($user);
    $accessToken = $users->createToken('authToken')->accessToken;
    return redirect('/category')->with('success','User logged in successfully');
}

public function logout(Request $request){
    auth::guard('web')->logout();

    $request -> session()->invalidate();
    $request -> session() -> regenerateToken() ;

    return redirect('/')->with('success','User logged out successfully');
    }

    public function index_for(){
        return Product::get();
    }
}

    //role
    // $admin = User::whereName('Admin')->with('roles')->first();
    // $admin_role = Role::whereName('admin')->first();
    // $admin->roles()->attach($admin_role);
    // dd($admin->toArray());
    //permission
    // $delete_category_permission = Permission::whereName('delete-category')->first();
    // $admin_role = Role::whereName('admin')->first();
    // $admin_role->permissions()->attach($delete_category_permission);
    // dd($admin_role->permissions);
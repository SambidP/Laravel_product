<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    public function index(){
        return view("index");
    }
    public function create(){
        return view("category.create");
    }

    public function show(){
        return view("category.show");
    }
    public function store(Request $request){
        
        // $request->validate([
        //     "title"=> "required|string|max:255",
        //     "description"=> "required|string|",
        //     "serialnumber"=> "required|integer|max:2",
        // ]);
        // Category::create($request->all());
        // dd($request->all());

        CategoryModel::create([
            "title"=> $request->title,
            "description"=> $request->description,
            "serialnumber"=> $request->serialnumber,
        ]);
        
        return view("category.store");
    }
}   


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class IndexController extends Controller
{
    public function index_for(){
        return Product::with('categories')->get();
    }
    public function group(){
        return Category::with('products')->get();
    }
}

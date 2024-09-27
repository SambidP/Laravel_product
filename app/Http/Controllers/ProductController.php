<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category_id = $request->input("category_id");
        $products = Product::where("category_id", $category_id)->get();
        return view('product.index', ['products'=> $products, 'category_id' => $category_id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'display_name' => 'required|string|max:255',
            'code' => 'required|integer',
            'image_path' => 'string|max:255',
            'description' => 'required|string|max:255',
            'category_id' => 'required|integer',
        ]);

        Product::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'display_name' => $request->display_name,
            'code' => $request->code,
            'image_path' => $request->image_path,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect('/product')->with('product_id','Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'display_name' => 'required|string|max:255',
            'code' => 'required|integer',
            'image_path' => 'string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $product->update([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'display_name' => $request->display_name,
            'code' => $request->code,
            'image_path' => $request->image_path,
            'description' => $request->description,
        ]);

        return redirect('/product')->with('product_id','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/product')->with('product_id','Product Deleted Successfully');
    }
}
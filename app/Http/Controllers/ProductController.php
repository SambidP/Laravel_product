<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category_id = $request->input("category_id");
        $products = Product::where('category_id', $category_id)->get();
        $category = Category::findOrFail($category_id);
        return view('product.index', compact('category', 'products', 'category_id'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'display_name' => 'required|string|max:255',
            'code' => 'required|integer',
            'image_path' => 'required|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string',
            'category_id' => 'required|integer',
        ]);
        if ($request->file('image_path')->isValid()) 
        {
            $imagePath = 'assets/avatars/';
            
            $filename = time() . '.' . $request->file('image_path')->getClientOriginalExtension();
            
            $request->file('image_path')->move(public_path($imagePath), $filename);
        
            Product::create([
                'product_id' => $request->product_id,
                'name' => $request->name,
                'display_name' => $request->display_name,
                'code' => $request->code,
                'image_path' => $imagePath . $filename,
                'description' => $request->description,
                'category_id' => $request->category_id,
            ]);
            return redirect()->route('category.index')->with('success', 'Product created successfully!');
        } 
    else 
        {
        return redirect()->back()->withErrors(['image_path' => 'Image upload failed.']);
        }
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'display_name' => 'required|string|max:255',
            'code' => 'required|integer',
            'image_path' => 'nullable|mimes:jpg,png,jpeg|max:2048',
            'description' => 'required|string|max:255',
            'category_id' => 'required|integer',
        ]);
        $imagePath = $product->image_path; 

        if ($request->hasFile('image_path')) {
        if ($request->file('image_path')->isValid()) 
        {
            $filename = time() . '.' . $request->file('image_path')->getClientOriginalExtension();

            $request->file('image_path')->move(public_path('assets/avatars'), $filename);

            $imagePath = 'assets/avatars/' . $filename;
        }
         else 
        {
            return redirect()->back()->withErrors(['image_path' => 'Invalid image file.']);
        }
    }
        $product->update([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'display_name' => $request->display_name,
            'code' => $request->code,
            'image_path' => $imagePath,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect('/category')->with('success','Product Updated Successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/category')->with('success','Product Deleted Successfully');
    }
}
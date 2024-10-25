<?php

namespace App\Http\Controllers;

use App\Models\{Category,Product,Customer};
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(8);
        return view('category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('category.create'); 
    }

    public function store(Request $request, Category $category)
    {   
        $request->validate([
            'name' => 'required|string|max:255',
            'display_name' => 'required|string|max:255',
            'code' => 'required|integer',
            'image_path' => 'mimes:jpg,png,jpeg,webp|max:2048',
            'description' => 'required|string',
        ]);

    if ($request->file('image_path')->isValid()) 
        {
            $imagePath = 'assets/avatars/';
            
            $filename = time() . '.' . $request->file('image_path')->getClientOriginalExtension();
            
            $request->file('image_path')->move(public_path($imagePath), $filename);
        
            Category::create([
                'name' => $request->name,
                'display_name' => $request->display_name,
                'code' => $request->code,
                'image_path' => $imagePath . $filename,
                'description' => $request->description,
            ]);
            return redirect()->route('category.index')->with('success', 'Category created successfully!');
        } 
    else 
        {
        return redirect()->back()->withErrors(['image_path' => 'Image upload failed.']);
        }
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'display_name' => 'required|string|max:255',
        'code' => 'required|integer',
        'image_path' => 'nullable|mimes:jpg,png,jpeg,webp|max:2048',
        'description' => 'required|string',
    ]);
    $imagePath = $category->image_path; 

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
    $category->update([
        'name' => $request->name,
        'display_name' => $request->display_name,
        'code' => $request->code,
        'image_path' => $imagePath,
        'description' => $request->description,
    ]);

    return redirect()->route('category.index')->with('success', 'Category updated successfully!');
}

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/category')->with('success','Category Deleted Successfully');
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('category.trash')->with('success', 'Category restored successfully.');
    }
    
    public function trash()
    {
        $categories = Category::onlyTrashed()->paginate(8);
        return view('category.trash', ['categories' => $categories]);
    }
    public function deletePermanently($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        if ($category->image_path && file_exists(public_path($category->image_path))) {
            unlink(public_path($category->image_path));
        }
        return redirect()->route('category.trash')->with('success', 'Category deleted permanently.');
    }

    public function dashboard(Customer $customers, Category $categories)
    {
        $customers = Customer::paginate(5);
        $categories = Category::paginate(5);
        $products = Product::paginate(5);
        return view('dashboard',['customers'=>$customers,'categories'=>$categories, 'products'=>$products]);
    }
}   
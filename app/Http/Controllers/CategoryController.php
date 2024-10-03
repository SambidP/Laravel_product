<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
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
        if (!Gate::allows('store', $category)) {
            abort(403);
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'display_name' => 'required|string|max:255',
            'code' => 'required|integer',
            'image_path' => 'mimes:jpg,png,jpeg|max:2048',
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

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
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
        'image_path' => 'nullable|mimes:jpg,png,jpeg|max:2048',
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
        if (!Gate::allows('delete', $category)) {
            abort(403);
        }
        $category->delete();
        return redirect('/category')->with('category_id','Category Deleted Successfully');
    }
}
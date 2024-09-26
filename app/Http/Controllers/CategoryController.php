<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'display_name' => 'required|string|max:255',
            'code' => 'required|integer|max:10',
            'image_path' => 'string|max:255',
            'description' => 'required|string|max:255',
        ]);

        Category::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'display_name' => $request->display_name,
            'code' => $request->code,
            'image_path' => $request->image_path,
            'description' => $request->description,
        ]);

        return redirect('/category')->with('name','Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'display_name' => 'required|string|max:255',
            'code' => 'required|integer|max:10',
            'image_path' => 'string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $category->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'display_name' => $request->display_name,
            'code' => $request->code,
            'image_path' => $request->image_path,
            'description' => $request->description,
        ]);

        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/category');
    }
}
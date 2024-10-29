<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Filters\V1\CategoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CategoryResource;
use App\Http\Resources\V1\CategoryCollection;
use App\Http\Requests\V1\StoreCategoryRequest;
use App\Http\Requests\V1\UpdateCategoryRequest;

class ApiCategoryController extends Controller
{
    public function index(Request $request)
    {
        $filter = new CategoryFilter();
        $filterItems = $filter->transform($request);

        $categories = Category::where($filterItems);

        return new CategoryCollection($categories->paginate()->appends($request->query()));
    }

    public function store(StoreCategoryRequest $request)
    {
        return new CategoryResource(Category::create($request->all()));
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return response()->Json([
            'message' => "Category updatedddd!!",
            'category' => $category
        ]);    
    }

    public function destroy(Category $category){
        $category->delete();
        return response()->Json([
            'message' => "Category Deleted!"
        ]);
    }
}
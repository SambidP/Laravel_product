<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Filters\V1\ProductFilter;
use App\Http\Resources\V1\ProductResource;
use App\Http\Requests\V1\StoreProductRequest;
use App\Http\Requests\V1\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductCollection;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ProductFilter();
        $queryItems = $filter->transform($request);
        if(count($queryItems) == 0){
            return new ProductCollection(Product::paginate());
        } else {
            $products = Product::where($queryItems)->paginate();
            return new ProductCollection($products->appends($request->query()));
            }    
    }
    public function store(StoreProductRequest $request)
    {
        return new ProductResource(Product::create($request->all()));
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return response()->Json([
            'message' => "Product updatedddd!!",
            'product' => $product
        ]);    
    }
    public function destroy(Product $product){
        $product->delete();
        return response()->Json([
            'message' => "Product Deleted!"
        ]);
    }
}
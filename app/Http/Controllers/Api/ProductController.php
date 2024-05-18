<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        
        $product = Product::findOrFail($product); 
        return new ProductResource($product); 
    }

    public function store(StoreProductRequest $request)
    {
        
        $product = Product::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Product Created successfully!",
            'product' => $product
        ], 200);
        
        
        // $product = Product::create($request->all());
        // return new ProductResource($product);


    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response(null, 204);
    }  
}

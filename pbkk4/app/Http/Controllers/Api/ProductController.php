<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        if($products->count() > 0){
            return ProductResource::collection($products);
        }else{
            return response()->json(['message' => 'No record available'], 200);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'link_picture' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are mandatory',
                'error' =>$validator->errors(),
            ], 422);
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'link_picture' => $request->link_picture,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            'message' => 'Product created successfully',
            'data' => new ProductResource($product)
        ], 200);
    }

    public function show(Product $product){
        return new ProductResource($product);
    }

    public function update(Request $request, Category $category){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'link_picture' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are mandatory',
                'error' =>$validator->errors(),
            ], 422);
        }

        $product = Product::update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'link_picture' => $request->link_picture,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => new ProductResource($product)
        ], 200);
    }

    public function destroy(Product $product){
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully',
        ], 200);
    }
}

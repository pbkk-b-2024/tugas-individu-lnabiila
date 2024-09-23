<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data['product'] = Product::with('category')
        ->searchWithRelations($request, 'category', ['name'])
        ->paginator($request);
        
        return view('product.index', compact('data'));
    }

    public function create() {
        $categories = Category::all(); // Mengambil semua kategori
        return view('product.create', ['data' => ['category' => $categories]]);
    }

    public function store(NewProductRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['category_id'] = $request->input('category_id'); // Ambil category_id langsung dari request
        $product = Product::create($validatedData);
        
        return redirect()->route('product.index')->with('success', 'Product "'.$product->name.'" sukses ditambahkan.');
    }

    public function show(Product $product)
    {
        $data['product'] = $product;
        return view('product.show', compact('data'));
    }

    public function edit(Product $product) 
    {
        $data['product'] = $product;
        $data['category'] = Category::all();
        return view('product.edit', compact('data'));
    }

public function update(UpdateProductRequest $request, Product $product)
{
    $validatedData = $request->validated();
    unset($validatedData['category']);
    
    // Update the product with all validated data except category
    $product->update($validatedData);
    
    // Update category_id separately
    $categoryID = $request->input('category'); // Make sure this is correctly retrieved as 'category'
    if (is_array($categoryID)) {
        $categoryID = $categoryID[0];
    }
    
    // Ensure category is not null
    if ($categoryID) {
        $product->category_id = $categoryID;
    }
    
    $product->save();

    return redirect()->route('product.index')->with('success', 'Product "'.$product->name.'" successfully updated');
}

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product "'.$product->name.'" sukses dihapus".');
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    public function index(Request $request)
    {
        $data['category'] = $query = Category::with('products')->search($request)->paginator($request);
        return view('category.index', compact('data'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        $validatedData = $request->validated();
        $category = Category::create($validatedData);
        return redirect()->route('category.index', $category->id)->with('success', 'Category "'.$category->name.'" sukses ditambahkan');
    }

    public function show(Category $category)
    {
        $data['category'] = $category;
        return view('category.show', compact('data'));
    }

    public function edit(Category $category)
    {
        $data['category'] = $category;
        return view('category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category "'.$category->name.'" sukses dihapus".');
    }
}

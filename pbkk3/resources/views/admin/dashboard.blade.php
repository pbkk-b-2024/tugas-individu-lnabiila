@extends('layouts.template')

@section('title', 'Home - Sepharo')

@section('content')
    <main class="flex-grow bg-white shadow-md rounded-md p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gray-100 rounded-md shadow hover:shadow-lg transition p-4">
                <a href="{{ route('product.index') }}" class="text-xl font-semibold text-gray-800">Manage Products</a>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gray-100 rounded-md shadow hover:shadow-lg transition p-4">
                <a href="{{ route('category.index') }}" class="text-xl font-semibold text-gray-800">Manage Categories</a>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gray-100 rounded-md shadow hover:shadow-lg transition p-4">
                <a href=# class="text-xl font-semibold text-gray-800" >Manage Brands</a>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gray-100 rounded-md shadow hover:shadow-lg transition p-4">
                <a href=# class="text-xl font-semibold text-gray-800" >Manage Stores</a>
            </div>
        </div>
    </main>
@endsection

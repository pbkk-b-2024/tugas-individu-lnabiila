@extends('layouts.template')

@section('title', 'Sepharo - Edit Product')

@section('content')
    <div class="card">
        <div class="card-body">
<form id="updateForm" action="{{ route('product.update', $data['product']->id) }}" method="POST">
    @csrf
    @method('PUT')

                <div class="form-group">
                    <label for="name">Product's Name</label>
                    <input type="text" class="form-control @error('name') is-invalname @enderror" id="name"
                        name="name" value="{{ old('name', $data['product']->name) }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" value="{{ old('description') }}" required>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="link_picture">Link Picture</label>
                            <input type="text" class="form-control @error('link_picture') is-invalid @enderror"
                                id="link_picture" name="link_picture" required>
                            @error('link_picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                id="price" name="price" required>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                id="stock" name="stock" required>
                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label><br>
                    @if ($data['category']->isEmpty())
                        <p>No categories available</p>
                    @else
                    <select class="form-control" id="category_id" name="category_id" required>
                        @foreach ($data['category'] as $data['category'])
                            <option value="{{ $data['category']->id }}" {{ old('category_id') == $data['category']->id ? 'selected' : '' }}>
                                {{ $data['category']->name }}
                            </option>
                        @endforeach
                    </select>

                    @endif
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            <button id="submitBtn" type="submit" class="btn btn-primary">Update Product</button>
            </form>
            <a href="{{ route('product.index') }}" class="btn btn-warning">Back</a>
            <form class="border-0" action="{{ route('product.destroy', $data['product']->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Product</button>
            </form>
        </div>
    </div>
@endsection
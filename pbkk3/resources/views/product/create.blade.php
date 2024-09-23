@extends('layouts.template')

@section('title', 'Sepharo - Add Product')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Product's Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" autocomplete="name" required>
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
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}" autocomplete="description" required>
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
                            <input type="text" class="form-control @error('link_picture') is-invalid @enderror" id="link_picture" name="link_picture" value="{{ old('link_picture') }}" autocomplete="off" required>
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
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" autocomplete="off" required>
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
                            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock') }}" autocomplete="off" required>
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
                        @foreach ($data['category'] as $k)
                            <option value="{{ $k->id }}" {{ old('category_id') == $k->id ? 'selected' : '' }}>
                                {{ $k->name }}
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
                <button type="submit" class="btn btn-primary" id="submitBtn">Add Product</button>
                <a href="{{ route('product.index') }}" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
@endpush

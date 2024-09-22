@extends('layouts.template')

@section('title', 'Sephora - Product Detail')

@section('content')
    <div class="card shadow-lg my-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <img src="{{ $data['product']->link_picture }}" class="img-fluid rounded border" alt="{{ $data['product']->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 class="font-weight-bold">{{ $data['product']->name }}</h4>
                        <h5 class="text-success">{{ $data['product']->price }}</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="stock" class="font-weight-bold">Stock</label>
                        <p id="stock" class="text-muted">{{ $data['product']->stock }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category" class="font-weight-bold">Category</label>
                        <p id="category">
                            @if($data['product']->category)
                                <span class="badge badge-info">{{ $data['product']->category->name }}</span>
                            @else
                                <span class="text-danger">No Category</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="font-weight-bold">Description</label>
                <p id="description" class="text-muted">{{ $data['product']->description }}</p>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection

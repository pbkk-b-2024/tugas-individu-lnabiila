@extends('layouts.template')

@section('title', 'Sepharo - Add Category')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Category's Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>
@endsection
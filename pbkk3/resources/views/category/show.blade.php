@extends('layouts.template')

@section('title', 'Sephora - Category Detail')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category Details</h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $data['category']->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $data['category']->name }}</td>
                    </tr>
                    <tr>
                        <th>Number of Products</th>
                        <td>{{ $data['category']->products->count() }}</td>
                    </tr>
                </tbody>
            </table>

            @auth
                @if (Auth::user()->usertype == 'admin')
                    <div class="d-flex">
                        <a href="{{ route('category.edit', $data['category']->id) }}" class="btn btn-warning me-2">Edit Category</a>
                        <form action="{{ route('category.destroy', $data['category']->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Category</button>
                        </form>
                    </div>
                @endif
            @endauth
            
            <a href="{{ route('category.index') }}" class="btn btn-primary mt-3">Back</a>
        </div>
    </div>
@endsection

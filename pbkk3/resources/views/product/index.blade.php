@extends('layouts.template')

@section('title', 'Sepharo - Products')

@section('content')
    <div class="card p-4 shadow-sm">
        <div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="{{ route('product.index') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" id="search"
                        placeholder="Search for product ..." value="{{ request()->get('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
            @if (Auth::check() && Auth::user()->usertype === 'admin')
            <a href="{{ route('product.create') }}" class="btn btn-success">Add Product</a>
            @endif
        </div>

        <div class="table-responsive">
            <table id="productTable" class="table table-hover table-striped">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Category</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['product'] as $b)
                        <tr>
                            <td>{{ $b->name }}</td>
                            <td>{{ $b->description }}</td>
                            <td>{{ $b->price }}</td>
                            <td>{{ $b->stock }}</td>
                            <td>
                                <img src="{{ $b->link_picture }}" class="img-fluid" style="max-width: 100px; height: auto;">
                            </td>
                            <td>
                                @if ($b->category)
                                    <span class="badge badge-info">{{ $b->category->name }}</span>
                                @else
                                    <span class="text-muted">No categories</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('product.show', $b->id) }}"
                                    class="btn btn-primary btn-sm mr-2">Show Detail</a>
                                @if (Auth::check() && Auth::user()->usertype === 'admin')
                                <a href="{{ route('product.edit', $b->id) }}" class="btn btn-primary btn-sm mr-1">Edit</a>
                                <form action="{{ route('product.destroy', $b->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if (Auth::check() && Auth::user()->usertype === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back</a>
            @elseif (Auth::check() && Auth::user()->usertype === 'user')
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
            @else
                <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $data['product']->links() }}
        </div>
    </div>
    <style>
        #productTable img {
            max-width: 80px;
            height: auto;
        }

        /* Optional custom styling for table */
        #productTable th, #productTable td {
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        
    </style>
@endsection

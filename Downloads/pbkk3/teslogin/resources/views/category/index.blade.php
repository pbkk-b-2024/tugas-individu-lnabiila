@extends('layouts.template')

@section('title', 'Sepharo - Categories')

@section('content')
    <div class="card p-3">
        <div class="">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="d-flex flex-column flex-md-row gap-2 mb-md-0 mb-2">
            <form action="{{ route('category.index') }}" method="GET" class="mr-md-2 mr-0 mb-2 mb-md-0 flex-grow-1">
                <div class="input-group ">
                    <input type="text" name="search" class="form-control" id="search" placeholder="Search for category ..."
                        value="{{ request()->get('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
            <div class="d-flex">
                {{ $data['category']->appends(['search' => request()->get('search'), 'limit' => request()->get('limit')])->links() }}
                <div class="ml-2">
                    @if (Auth::check() && Auth::user()->usertype === 'admin')
                    <a href="{{ route('category.create') }}" class="text-white">
                        <button class="btn btn-success">
                            Add Category
                        </button>
                    </a>
                    @endif
                </div>
            </div>

        </div>
        <div class="overflow-auto">`
            <table id="categoryTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Number of Products</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['category'] as $category)
                        <tr>
                            <td>
                                <a href="{{ route('category.show', $category->id) }}">
                                    {{ Str::limit($category->name, 20, '...') }}
                                </a>
                            </td>
                            <td>{{ count($category->products) }}</td>
                            <td class="d-flex">
                                <a href="{{ route('category.show', $category->id) }}"
                                    class="btn btn-primary btn-sm mr-2">Show Detail</a>
                                @if (Auth::check() && Auth::user()->usertype === 'admin')
                                <a href="{{ route('category.edit', $category->id) }}"
                                    class="btn btn-primary btn-sm mr-2">Edit</a>
                                <form class="border-0" action="{{ route('category.destroy', $category->id) }}"
                                    method="POST" style="display:inline-block;">
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
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable({
                paging: true,
                searching: true,
                ordering: true
            });
        });
    </script>
@endpush
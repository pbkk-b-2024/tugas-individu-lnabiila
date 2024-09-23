@extends('layouts.template')

@section('title', 'Sepharo - Edit Category')

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="updateForm" action="{{ route('category.update', $data['category']->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Category's Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $data['category']->name) }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-warning">Back</a>
            <form class="border-0" action="{{ route('category.destroy', $data['category']->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Category</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('submitBtn').addEventListener('click', function() {
            document.getElementById('updateForm').submit();
        });
    </script>
@endpush

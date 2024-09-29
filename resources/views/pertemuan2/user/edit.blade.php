@extends('layout.base')

@section('title', 'Edit User')

@push('styles')
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="updateForm" action="{{ route('crud-user.update', $data['user']->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menandakan bahwa ini adalah request untuk update -->

                <div class="form-group">
                    <label for="name">Nama User</label>
                    <input type="text" class="form-control @error('name') is-invalname @enderror" id="name"
                        name="name" value="{{ old('name', $data['user']->name) }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required>
                            <small class="form-text text-muted">
                                Minimum 8 characters, must contain letters, numbers, and mixed case.
                            </small>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" required>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="selectpicker w-100 @error('role') is-invalid @enderror" id="role"
                        name="role[]" multiple>
                        @foreach ($data['role'] as $k)
                            <option value="{{ $k->id }}">
                                {{ $k->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

            </form>
            <button id="submitBtn" type="submit" class="btn btn-primary">Update User</button>
            <a href="{{ route('crud-user.index') }}" class="btn btn-warning">Kembali ke Daftar User</a>
            <a href="{{ route('crud-user.show', $data['user']->id) }}" class="btn btn-warning">
                Kembali ke Detail User</a>
            <form class="border-0" action="{{ route('crud-user.destroy', $data['user']->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus User</button>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="/js/bootstrap-select.min.js"></script>
@endpush
@push('scripts')
    <script>
        document.getElementById('submitBtn').addEventListener('click', function() {
            document.getElementById('updateForm').submit();
        });
    </script>
@endpush

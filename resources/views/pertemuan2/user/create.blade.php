@extends('layout.base')

@push('styles')
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
@endpush

@section('title', 'Tambah User')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('crud-user.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama User</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') }}" required>
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

                <div>
                    <div class="form-group">
                        <label for="role">Role</label><br>
                        <select class="selectpicker w-100" id="role" name="role[]"
                            class="form-control @error('role') is-invalid @enderror" multiple>
                            @foreach ($data['role'] as $k)
                                <option value="{{ $k->id }}"
                                    {{ in_array($k->id, old('role', [])) ? 'selected' : '' }}>
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
                </div>

                <button type="submit" class="btn btn-primary">Tambah User</button>
                <a href="{{ route('crud-user.index') }}" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/js/bootstrap-select.min.js"></script>
@endpush

@extends('layout.base')

@section('title', 'Tambah Role')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('crud-role.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Role</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah Role</button>
                <a href="{{ route('crud-role.index') }}" class="btn btn-warning">Kembali</a><a href="#"></a>
            </form>
        </div>
    </div>
@endsection

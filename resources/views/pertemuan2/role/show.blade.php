@extends('layout.base')

@section('title', 'Detail Role')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <p id="id">{{ $data['role']->id }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Nama Role</label>
                        <p id="name">{{ $data['role']->name }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="count">Jumlah User</label>
                        <p id="name">{{ count($data['role']->users) }}</p>
                    </div>
                </div>
            </div>

            <a href="{{ route('crud-role.index') }}" class="btn btn-primary">Kembali ke Daftar Role</a>
            <a href="{{ route('crud-role.edit', $data['role']->id) }}" class="btn btn-warning">Edit Role</a>
            <form class="border-0" action="{{ route('crud-role.destroy', $data['role']->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus
                    role</button>
            </form>
        </div>
    </div>
@endsection

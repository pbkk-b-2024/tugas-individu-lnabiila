@extends('layout.base')

@section('title', 'Detail User')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <p id="id">{{ $data['user']->id }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nama User</label>
                        <p id="name">{{ $data['user']->name }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <p id="email">{{ $data['user']->email }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <br>
                            @if($data['user']->role)
                                <span>{{ $data['user']->role->name }}</span>
                            @else
                                <span>No Role</span>
                            @endif
                    </div>
                </div>
            </div>

            <a href="{{ route('crud-user.index') }}" class="btn btn-primary">Kembali ke Daftar User</a>
            <a href="{{ route('crud-user.edit', $data['user']->id) }}" class="btn btn-warning">Edit User</a>
            <form class="border-0" action="{{ route('crud-user.destroy', $data['user']->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus User</button>
            </form>
        </div>
    </div>
@endsection

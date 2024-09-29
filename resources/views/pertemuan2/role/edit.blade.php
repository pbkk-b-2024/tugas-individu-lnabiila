@extends('layout.base')

@section('title', 'Edit Role')

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="updateForm" action="{{ route('crud-role.update', $data['role']->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menandakan bahwa ini adalah request untuk update -->

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $data['role']->name) }}" required>
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </form>
            <button id="submitBtn" type="submit" class="btn btn-primary">Update Role</button>
            <a href="{{ route('crud-role.index') }}" class="btn btn-warning">Kembali ke Daftar Role</a>
            <a href="{{ route('crud-role.show', $data['role']->id) }}" class="btn btn-warning">
                Kembali ke Detail Role</a>
            <form class="border-0" action="{{ route('crud-role.destroy', $data['role']->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus Role</button>
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

@extends('layouts.template')

@section('title', 'Sekolah - Edit kelas')

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="updateForm" action="{{ route('kelas.update', $data['kelas']->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama Kelas</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama', $data['kelas']->nama) }}" required>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update kelas</button>
            </form>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-warning">Kembali</a>
            <form class="border-0" action="{{ route('kelas.destroy', $data['kelas']->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Simpan</button>
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

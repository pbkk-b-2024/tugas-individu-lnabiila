@extends('layouts.template')

@section('title', 'Sekolah - Tambah kelas')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Kelas</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        value="{{ old('nama') }}" required>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
@endsection
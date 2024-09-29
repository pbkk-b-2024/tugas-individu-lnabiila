@extends('layout.base')
@push('styles')
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
@endpush
@section('title', 'Tambah Barang')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('crud-barang.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <textarea class="form-control @error('kode') is-invalkode @enderror" id="kode" name="kode"
                        value="{{ old('kode') }}" required></textarea>
                    @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control @error('stok') is-invalid @enderror"
                                id="stok" name="stok" value="{{ old('stok') }}" required>
                            @error('stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                id="harga" name="harga" value="{{ old('harga') }}">
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kategori">Kategori</label><br>
                            <select class="selectpicker w-100" id="kategori" name="kategori[]"
                                class="form-control @error('kategori') is-invalid @enderror" multiple>
                                @foreach ($data['kategori'] as $k)
                                    <option value="{{ $k->id }}"
                                        {{ in_array($k->id, old('kategori', [])) ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Barang</button>
                <a href="{{ route('crud-barang.index') }}" class="btn btn-warning">Kembali</a><a href="#"></a>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="/js/bootstrap-select.min.js"></script>
@endpush

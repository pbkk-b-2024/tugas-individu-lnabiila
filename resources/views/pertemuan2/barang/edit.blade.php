@extends('layout.base')

@section('title', 'Edit Barang')

@push('styles')
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="updateForm" action="{{ route('crud-barang.update', $data['barang']->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menandakan bahwa ini adalah request untuk update -->

                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" class="form-control @error('kode') is-invalkode @enderror" id="kode"
                        name="kode" value="{{ old('kode', $data['barang']->kode) }}" required>
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
                                name="nama" value="{{ old('nama', $data['barang']->nama) }}" required>
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
                                id="stok" name="stok" value="{{ old('stok', $data['barang']->stok) }}"
                                required>
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
                                id="harga" name="harga"
                                value="{{ old('harga', $data['barang']->harga) }}">
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="selectpicker w-100 @error('kategori') is-invalid @enderror" id="kategori"
                                name="kategori[]" multiple>
                                @foreach ($data['kategori'] as $k)
                                    <option value="{{ $k->id }}"
                                        {{ in_array($k->id, old('kategori', $data['barang-kategori'])) ? 'selected' : '' }}>
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

                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                id="kategori" name="kategori" value="{{ old('kategori', $data['buku']->kategori) }}">
                            @error('kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                </div>


            </form>
            <button id="submitBtn" type="submit" class="btn btn-primary">Update Barang</button>
            <a href="{{ route('crud-barang.index') }}" class="btn btn-warning">Kembali ke Daftar Barang</a>
            <a href="{{ route('crud-barang.show', $data['barang']->id) }}" class="btn btn-warning">
                Kembali ke Detail Barang</a>
            <form class="border-0" action="{{ route('crud-barang.destroy', $data['barang']->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus Barang</button>
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

@extends('layout.base')

@section('title', 'Detail Barang')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <p id="id">{{ $data['barang']->id }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <p id="kode">{{ $data['barang']->kode }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <p id="nama">{{ $data['barang']->nama }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <p id="stok">{{ $data['barang']->stok }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <p id="harga">{{ $data['barang']->harga }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <br>
                        @foreach ($data['barang']->kategoris as $k)
                            <span>{{ $k->nama }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <a href="{{ route('crud-barang.index') }}" class="btn btn-primary">Kembali ke Daftar Barang</a>
            <a href="{{ route('crud-barang.edit', $data['barang']->id) }}" class="btn btn-warning">Edit Barang</a>
            <form class="border-0" action="{{ route('crud-barang.destroy', $data['barang']->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus Barang</button>
            </form>
        </div>
    </div>
@endsection

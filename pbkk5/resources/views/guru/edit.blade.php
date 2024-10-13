@extends('layouts.template')

@section('title', 'Sekolah - Edit Guru')

@section('content')
    <div class="card">
        <div class="card-body">
<form id="updateForm" action="{{ route('guru.update', $data['guru']->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_depan">Nama Depan</label>
                            <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="nama_depan"
                                name="nama_depan" value="{{ old('nama_depan') }}" required>
                            @error('nama_depan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror"
                                id="nama_belakang" name="nama_belakang" required>
                            @error('nama_belakang')
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
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                id="tanggal_lahir" name="tanggal_lahir" required>
                            @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="" disabled {{ old('jenis_kelamin') == null ? 'selected' : '' }}>Pilih Jenis Kelamin</option>
                                <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            </select>
                            @error('jenis_kelamin')
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

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_telp">Nomor Telepon</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror"
                                id="no_telp" name="no_telp" required>
                            @error('no_telp')
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
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                id="foto" name="foto" required>
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label><br>
                            @if ($data['kelas']->isEmpty())
                                <p>No class available</p>
                            @else
                            <select class="form-control" id="kelas_id" name="kelas_id" required>
                                @foreach ($data['kelas'] as $data['kelas'])
                                    <option value="{{ $data['kelas']->id }}" {{ old('kelas_id') == $data['kelas']->id ? 'selected' : '' }}>
                                        {{ $data['kelas']->nama }}
                                    </option>
                                @endforeach
                            </select>

                            @endif
                            @error('kelas_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            <button id="submitBtn" type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <a href="{{ route('guru.index') }}" class="btn btn-warning">Kembali</a>
            <form class="border-0" action="{{ route('guru.destroy', $data['guru']->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus guru</button>
            </form>
        </div>
    </div>
@endsection
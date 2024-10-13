@extends('layouts.template')

@section('title', 'Sekolah - Detail Guru')

@section('content')
    <div class="card shadow-lg my-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_depan" class="font-weight-bold">Nama Depan</label>
                        <p id="nama_depan" class="text-muted">{{ $data['guru']->nama_depan }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_belakang" class="font-weight-bold">Nama Belakang</label>
                        <p id="nama_belakang" class="text-muted">{{ $data['guru']->nama_belakang }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_lahir" class="font-weight-bold">Tanggal Lahir</label>
                        <p id="tanggal_lahir" class="text-muted">{{ $data['guru']->tanggal_lahir }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_kelamin" class="font-weight-bold">Jenis Kelamin</label>
                        <p id="jenis_kelamin" class="text-muted">{{ $data['guru']->jenis_kelamin }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email</label>
                        <p id="email" class="text-muted">{{ $data['guru']->email }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_telp" class="font-weight-bold">Nomor Telepon</label>
                        <p id="no_telp" class="text-muted">{{ $data['guru']->no_telp }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kelas" class="font-weight-bold">Kelas</label>
                        <p id="kelas">
                            @if($data['product']->kelas)
                                <span class="badge badge-info">{{ $data['product']->kelas->nama }}</span>
                            @else
                                <span class="text-danger">No class</span>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Foto</label>
                        <img src="{{ asset('Fotoguru/' . $data['guru']->foto) }}" alt="Foto guru" class="img-fluid">
                    </div>
                </div>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection

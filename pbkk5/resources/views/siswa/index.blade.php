@extends('layouts.template')

@section('title', 'Sekolah - Daftar Siswa')

@section('content')
    <div class="card p-4 shadow-sm">
        <div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="{{ route('siswa.index') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" id="search"
                        placeholder="Cari siswa ..." value="{{ request()->get('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
            @if (Auth::check() && Auth::user()->usertype === 'admin')
            <a href="{{ route('siswa.create') }}" class="btn btn-success">Tambah siswa</a>
            @endif
        </div>

        <div class="table-responsive">
            <table id="siswaTable" class="table table-hover table-striped">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Depan</th>
                        <th scope="col">Nama Belakang</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Nama Orang Tua</th>
                        <th scope="col">Nomor Telepon Orang Tua</th>
                        <th scope="col">Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['siswa'] as $b)
                        <tr>
                            <td>
                                <img src="{{ asset($b->foto) }}" class="w-100">
                            </td>
                            <td>{{ $b->nama_depan }}</td>
                            <td>{{ $b->nama_belakang }}</td>
                            <td>{{ $b->tanggal_lahir }}</td>
                            <td>{{ $b->jenis_kelamin }}</td>
                            <td>{{ $b->email }}</td>
                            <td>{{ $b->no_telp }}</td>
                            <td>{{ $b->nama_ortu }}</td>
                            <td>{{ $b->no_telp_ortu }}</td>
                            <td>
                                @if ($b->kelas)
                                    <span class="badge badge-info">{{ $b->kelas->nama }}</span>
                                @else
                                    <span class="text-muted">No class</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('siswa.show', $b->id) }}"
                                    class="btn btn-primary btn-sm mr-2">Detail siswa</a>
                                @if (Auth::check() && Auth::user()->usertype === 'admin')
                                <a href="{{ route('siswa.edit', $b->id) }}" class="btn btn-primary btn-sm mr-1">Edit</a>
                                <form action="{{ route('siswa.destroy', $b->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Hapus</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if (Auth::check() && Auth::user()->usertype === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Kembali</a>
            @elseif (Auth::check() && Auth::user()->usertype === 'user')
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali</a>
            @else
                <a href="{{ route('home') }}" class="btn btn-primary">Kembali</a>
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $data['siswa']->links() }}
        </div>
    </div>
    <style>
        #siswaTable img {
            max-width: 80px;
            height: auto;
        }

        #siswaTable th, #siswaTable td {
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        
    </style>
@endsection

@extends('layouts.template')

@section('title', 'Sekolah - Detail Kelas')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail Kelas</h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $data['kelas']->id }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $data['kelas']->nama }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Siswa</th>
                        <td>{{ isset($data['siswa']) ? count($data['siswa']) : 0 }}</td>
                    </tr>
                </tbody>
            </table>

            @auth
                @if (Auth::user()->usertype == 'admin')
                    <div class="d-flex">
                        <a href="{{ route('kelas.edit', $data['kelas']->id) }}" class="btn btn-warning me-2">Edit kelas</a>
                        <form action="{{ route('kelas.destroy', $data['kelas']->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus kelas</button>
                        </form>
                    </div>
                @endif
            @endauth
            
            <a href="{{ route('kelas.index') }}" class="btn btn-primary mt-3">Kembali</a>
        </div>
    </div>
@endsection

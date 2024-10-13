@extends('layouts.template')

@section('title', 'Home - Sepharo')

@section('content')
    <main class="flex-grow bg-white shadow-md rounded-md p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gray-100 rounded-md shadow hover:shadow-lg transition p-4">
                <a href="{{ route('siswa.index') }}" class="text-xl font-semibold text-gray-800">Manage Siswa</a>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gray-100 rounded-md shadow hover:shadow-lg transition p-4">
                <a href="{{ route('kelas.index') }}" class="text-xl font-semibold text-gray-800">Manage Kelas</a>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gray-100 rounded-md shadow hover:shadow-lg transition p-4">
                <a href="{{ route('guru.index') }}" class="text-xl font-semibold text-gray-800">Manage Guru</a>
            </div>
        </div>
    </main>
@endsection

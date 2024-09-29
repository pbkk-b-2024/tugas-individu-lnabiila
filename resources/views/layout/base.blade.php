@extends('layout.template')

@section('sidebar')
    <x-menu-tree title="Pertemuan 2" icon="fas fa-bars" :active="request()->is('pertemuan2/*')">
        <x-menu-item title="List Role" icon="fas fa-star" :href="route('crud-role.index')" :active="request()->routeIs('crud-role.index')"></x-menu-item>
        <x-menu-item title="List User" icon="fas fa-star" :href="route('crud-user.index')" :active="request()->routeIs('crud-user.index')"></x-menu-item>
        <x-menu-item title="List Kategori" icon="fas fa-star" :href="route('crud-kategori.index')" :active="request()->routeIs('crud-kategori.index')"></x-menu-item>
        <x-menu-item title="List Barang" icon="fas fa-star" :href="route('crud-barang.index')" :active="request()->routeIs('crud-barang.index')"></x-menu-item>
    </x-menu-tree>
@endsection
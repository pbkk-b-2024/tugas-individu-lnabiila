@extends('layout.template')
@section('sidebar')
    <li data-pertemuan="2" class="nav-item has-treeview  {{ request()->is('pertemuan2/*') ? 'menu-open' : '' }} ">
        <a href="#" class="nav-link {{ request()->is('pertemuan2/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Pertemuan 2
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('crud-barang.index') }}"
                    class="nav-link {{ request()->routeIs('crud-barang.index') ? 'active' : '' }}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>List Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('crud-barang.create') }}"
                    class="nav-link {{ request()->routeIs('crud-barang.create') ? 'active' : '' }}">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Tambah Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('crud-kategori.index') }}"
                    class="nav-link {{ request()->routeIs('crud-kategori.index') ? 'active' : '' }}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>List Kategori</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('crud-kategori.create') }}"
                    class="nav-link {{ request()->routeIs('crud-kategori.create') ? 'active' : '' }}">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Tambah Kategori</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('crud-user.index') }}"
                    class="nav-link {{ request()->routeIs('crud-user.index') ? 'active' : '' }}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>List User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('crud-user.create') }}"
                    class="nav-link {{ request()->routeIs('crud-user.create') ? 'active' : '' }}">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Tambah User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('crud-role.index') }}"
                    class="nav-link {{ request()->routeIs('crud-role.index') ? 'active' : '' }}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>List Role</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('crud-role.create') }}"
                    class="nav-link {{ request()->routeIs('crud-role.create') ? 'active' : '' }}">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Tambah Role</p>
                </a>
            </li>
        </ul>
    </li>
@endsection

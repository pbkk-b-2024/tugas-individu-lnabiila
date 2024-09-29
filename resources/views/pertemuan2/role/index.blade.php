@extends('layout.base')

@section('title', 'List Role')

@section('content')

    <div class="card p-3">
        <div class="">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="d-flex flex-column flex-md-row gap-2 mb-md-0 mb-2">
            <form action="{{ route('crud-role.index') }}" method="GET" class="mr-md-2 mr-0 mb-2 mb-md-0 flex-grow-1">
                <div class="input-group ">
                    <input type="text" name="search" class="form-control" id="search" placeholder="nama role"
                        value="{{ request()->get('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
            <div class="d-flex">
                {{ $data['role']->appends(['search' => request()->get('search'), 'limit' => request()->get('limit')])->links() }}
                <div class="ml-2">
                    <a href="{{ route('crud-role.create') }}" class="text-white">
                        <button class="btn btn-success">
                            Tambah Role
                        </button>
                    </a>
                </div>
            </div>

        </div>
        <div class="overflow-auto">`
            <table id="roleTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nama Role</th>
                        <th>Jumlah User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data['role'] as $role)
                        <tr>
                            <td>
                                {{ $role->id }}
                            </td>
                            <td>
                                <a href="{{ route('crud-role.show', $role->id) }}">
                                    {{ Str::limit($role->name, 20, '...') }}
                                </a>
                            </td>
                            <td>{{ count($role->users) }}</td>
                            <td class="d-flex">
                                <a href="{{ route('crud-role.show', $role->id) }}"
                                    class="btn btn-primary btn-sm mr-2">Lihat Detail</a>
                                <a href="{{ route('crud-role.edit', $role->id) }}"
                                    class="btn btn-primary btn-sm mr-2">Edit</a>
                                <form class="border-0" action="{{ route('crud-role.destroy', $role->id) }}"
                                    method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#roleTable').DataTable({
                paging: true,
                searching: true,
                ordering: true
            });
        });
    </script>
@endpush

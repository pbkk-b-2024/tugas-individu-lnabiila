<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController
{
    public function index(Request $request)
    {
        $data['role'] = $query = Role::with('users')->search($request)->paginator($request);
        return view('pertemuan2.role.index', compact('data'));
    }

    public function create()
    {
        return view('pertemuan2.role.create');
    }

    public function store(RoleRequest $request)
    {
        $validatedData = $request->validated();
        $role = Role::create($validatedData);
        return redirect()->route('crud-role.index', $role->id)->with('success', 'role "'.$role->name.'" sukses ditambahkan');
    }

    public function show(Role $role)
    {
        $data['role'] = $role;
        return view('pertemuan2.role.show', compact('data'));
    }

    public function edit(Role $role)
    {
        $data['role'] = $role;
        return view('pertemuan2.role.edit', compact('data'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $validatedData = $request->validated();
        $role->update($validatedData);
        return redirect()->route('crud-role.index', $role->id)->with('success', 'role "'.$role->name.'" sukses diubah');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('crud-role.index')->with('success', 'role "' . $role->name . '" sukses dihapus".');
    }
}

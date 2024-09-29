<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data['user'] = User::with('role')
        ->searchWithRelations($request, 'role', ['nama'])
        ->paginator($request);

        return view('pertemuan2.user.index', compact('data'));
    }

    public function create()
    {
        $data['role'] = Role::all();
        return view('pertemuan2.user.create', compact('data'));
    }

    public function store(NewUserRequest $request)
    {
        $validatedData = $request->validated();
        unset($validatedData['role']);
        $user = User::create($validatedData);
        $roleId = $request->input('role');
        if (is_array($roleId)) {
            $roleId = $roleId[0];
        }
        $user->role_id = $roleId;
        $user->save();
        return redirect()->route('crud-user.index')->with('success', 'User "' . $user->name . '" sukses ditambahkan.');
    }

    public function show(User $user)
    {
        $data['user'] = $user;
        return view('pertemuan2.user.show', compact('data'));
    }

    public function edit(User $user) 
    {
        $data['user'] = $user;
        $data['role'] = Role::all();
        return view('pertemuan2.user.edit', compact('data'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validatedData = $request->validated();
        unset($validatedData['role']);
        $user->update($validatedData);
        $roleId = $request->input('role');
        if (is_array($roleId)) {
            $roleId = $roleId[0];
        }
        $user->role_id = $roleId;
        $user->save();
        return redirect()->route('crud-user.index', $user->id)->with('success', 'User "'.$user->nama.'" sukses diubah');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('crud-user.index')->with('success', 'User "' . $user->nama . '" sukses dihapus".');
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuangRequest;
use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController
{
    public function index(Request $request)
    {
        $data['ruang'] = $query = Ruang::with('jadwals')->search($request)->paginator($request);
        return view('ruang.index', compact('data'));
    }

    public function create()
    {
        return view('ruang.create');
    }

    public function store(RuangRequest $request)
    {
        $validatedData = $request->validated();
        $ruang = Ruang::create($validatedData);
        return redirect()->route('ruang.index', $ruang->id)->with('success', 'ruang "'.$ruang->name.'" sukses ditambahkan');
    }

    public function show(Ruang $ruang)
    {
        $data['ruang'] = $ruang;
        return view('ruang.show', compact('data'));
    }

    public function edit(Ruang $ruang)
    {
        $data['ruang'] = $ruang;
        return view('ruang.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $ruang = Ruang::findOrFail($id);
        $ruang->name = $request->input('name');
        $ruang->save();

        return redirect()->route('ruang.index')->with('success', 'ruang updated successfully');
    }

    public function destroy(Ruang $ruang)
    {
        $ruang->delete();
        return redirect()->route('ruang.index')->with('success', 'ruang "'.$ruang->name.'" sukses dihapus".');
    }
}

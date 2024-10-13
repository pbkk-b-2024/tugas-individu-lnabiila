<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController
{
    public function index(Request $request)
    {
        $data['kelas'] = $query = Kelas::with('siswas')->search($request)->paginator($request);
        return view('kelas.index', compact('data'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(KelasRequest $request)
    {
        $validatedData = $request->validated();
        $kelas = Kelas::create($validatedData);
        return redirect()->route('kelas.index', $kelas->id)->with('success', 'kelas "'.$kelas->nama.'" sukses ditambahkan');
    }

    public function show(Kelas $kelas)
    {
        $data['kelas'] = $kelas;
        return view('kelas.show', compact('data'));
    }

    public function edit(Kelas $kelas)
    {
        $data['kelas'] = $kelas;
        return view('kelas.edit', compact('data'));
    }

    public function update(KelasRequest $request, Kelas $kelas)
    {
        $validatedData = $request->validated();
        $kelas->update($validatedData);
        return redirect()->route('kelas.index', $kelas->id)->with('success', 'kelas "'.$kelas->nama.'" sukses diubah');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'kelas "' . $kelas->nama . '" sukses dihapus".');
    }
}

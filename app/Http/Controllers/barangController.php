<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class barangController extends Controller
{
    public function index(Request $request)
    {
        $relation = 'kategoris'; 
        $data['barang'] = Barang::with($relation)
        ->searchWithRelations($request, $relation, ['nama'])->paginator($request);

        return view('pertemuan2.barang.index', compact('data'));
    }

    public function create()
    {
        $data['kategori'] = Kategori::all();
        return view('pertemuan2.barang.create',compact('data'));
    }

    public function store(NewBarangRequest $request)
    {
        $validatedData = $request->validated();
        unset($validatedData['kategori']);
        $barang = Barang::create($validatedData);
        $barang->kategoris()->attach($request->input('kategori'));

        return redirect()->route('crud-barang.index')->with('success', 'Barang "' . $barang->nama . '" sukses ditambahkan.');
    }

    public function show(Barang $barang)
    {
        $data['barang'] = $barang;
        return view('pertemuan2.barang.show', compact('data'));
    }

    public function edit(Barang $barang) 
    {
        $data['barang'] = $barang;
        $data['barang-kategori'] = $barang->kategoris->pluck('id')->toArray();
        $data['kategori'] = Kategori::all();
        return view('pertemuan2.barang.edit', compact('data'));
    }

    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $validatedData = $request->validated();
        unset($validatedData['kategori']);
        $barang->update($validatedData);
        $barang->kategoris()->sync($request->input('kategori'));
        return redirect()->route('crud-barang.index', $barang->id)->with('success', 'barang "'.$barang->nama.'" sukses diubah');
    }

    public function destroy(Barang $barang)
    {
        $barang->kategoris()->detach();
        $barang->delete();
        return redirect()->route('crud-barang.index')->with('success', 'Barang "' . $barang->nama . '" sukses dihapus".');
    }
}
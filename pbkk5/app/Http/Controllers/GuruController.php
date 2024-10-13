<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $relation = 'kelass'; 
        $data['guru'] = Guru::with($relation)
        ->searchWithRelations($request, $relation, ['nama_depan', 'nama_belakang', 'nama'])->paginator($request);

        return view('guru.index', compact('data'));
    }

    public function create()
    {
        $data['kelas'] = Kelas::all();
        return view('guru.create',compact('data'));
    }

    public function store(NewGuruRequest $request)
    {
        $validatedData = $request->validated();
        unset($validatedData['kelas']);
        $guru = Guru::create($validatedData);
        $guru->kelass()->attach($request->input('kelas'));

    if ($request->has('foto')) {
        $file = $request->file('foto');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('Fotoguru/', $filename);

        // Simpan nama file ke dalam database
        $guru->foto = 'Fotoguru/' . $filename;
        $guru->save();
    }
        
        return redirect()->route('guru.index')->with('success', 'guru "' . $guru->nama_depan . '" sukses ditambahkan.');
    }

    public function show(Guru $guru)
    {
        $data['guru'] = $guru;
        return view('guru.show', compact('data'));
    }

    public function edit(Guru $guru) 
    {
        $data['guru'] = $guru;
        $data['guru-kelas'] = $guru->kelass->pluck('id')->toArray();
        $data['kelas'] = Kelas::all();
        return view('guru.edit', compact('data'));
    }

    public function update(UpdateGuruRequest $request, Guru $guru)
    {
        $validatedData = $request->validated();
        unset($validatedData['kelas']);
        $guru->update($validatedData);
        $guru->kelass()->sync($request->input('kelas'));

        return redirect()->route('guru.index', $guru->id)->with('success', 'guru "'.$guru->nama_depan.'" sukses diubah');
    }

    public function destroy(Guru $guru)
    {
        $guru->kelass()->detach();
        $guru->delete();

        if(File::exists(public_path($guru->foto))){
            File::delete(public_path($guru->foto));
        }

        return redirect()->route('guru.index')->with('success', 'guru "' . $guru->nama_depan . '" sukses dihapus".');
    }
}
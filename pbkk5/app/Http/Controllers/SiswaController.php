<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $relation = 'kelass'; 
        $data['siswa'] = Siswa::with($relation)
        ->searchWithRelations($request, $relation, ['nama_depan', 'nama_belakang', 'nama_ortu', 'nama'])->paginator($request);

        return view('siswa.index', compact('data'));
    }

    public function create()
    {
        $data['kelas'] = Kelas::all();
        return view('siswa.create',compact('data'));
    }

    public function store(NewSiswaRequest $request)
    {
        $validatedData = $request->validated();
        unset($validatedData['kelas']);
        $siswa = Siswa::create($validatedData);
        $siswa->kelass()->attach($request->input('kelas'));

    if ($request->has('foto')) {
        $file = $request->file('foto');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('FotoSiswa/', $filename);

        // Simpan nama file ke dalam database
        $siswa->foto = 'FotoSiswa/' . $filename;
        $siswa->save();
    }
        
        return redirect()->route('siswa.index')->with('success', 'siswa "' . $siswa->nama_depan . '" sukses ditambahkan.');
    }

    public function show(Siswa $siswa)
    {
        $data['siswa'] = $siswa;
        return view('siswa.show', compact('data'));
    }

    public function edit(Siswa $siswa) 
    {
        $data['siswa'] = $siswa;
        $data['siswa-kelas'] = $siswa->kelass->pluck('id')->toArray();
        $data['kelas'] = Kelas::all();
        return view('siswa.edit', compact('data'));
    }

    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        $validatedData = $request->validated();
        unset($validatedData['kelas']);
        $siswa->update($validatedData);
        $siswa->kelass()->sync($request->input('kelas'));

        return redirect()->route('siswa.index', $siswa->id)->with('success', 'siswa "'.$siswa->nama_depan.'" sukses diubah');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->kelass()->detach();
        $siswa->delete();

        if(File::exists(public_path($siswa->foto))){
            File::delete(public_path($siswa->foto));
        }

        return redirect()->route('siswa.index')->with('success', 'siswa "' . $siswa->nama_depan . '" sukses dihapus".');
    }
}
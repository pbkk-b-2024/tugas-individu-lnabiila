<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Models\Jadwal;
use App\Models\Ruang;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        // Gabungkan dua relasi dalam satu query
        $data['jadwal'] = Jadwal::with(['ruang', 'kelas'])
            ->searchWithRelations($request, 'ruang', ['name'])
            ->searchWithRelations($request, 'kelas', ['name'])
            ->paginator($request);

        return view('jadwal.index', compact('data'));
    }

    public function create() {
        $ruang = Ruang::all(); 
        $kelas = Kelas::all();
        return view('jadwal.create', ['data' => ['ruang' => $ruang, 'kelas' => $kelas]]);
    }

    public function store(NewJadwalRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['ruang_id'] = $request->input('ruang_id');
        $validatedData['kelas_id'] = $request->input('kelas_id');
        
        $jadwal = Jadwal::create($validatedData);
        
        return redirect()->route('jadwal.index')->with('success', 'jadwal "'.$jadwal->name.'" sukses ditambahkan.');
    }

    public function show(Jadwal $jadwal)
    {
        $data['jadwal'] = $jadwal;
        return view('jadwal.show', compact('data'));
    }

    public function edit(Jadwal $jadwal) 
    {
        $data['jadwal'] = $jadwal;
        $data['ruang'] = Ruang::all();
        $data['kelas'] = Kelas::all();
        return view('jadwal.edit', compact('data'));
    }

    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        $validatedData = $request->validated();

        $ruangID = $request->input('ruang');
        $kelasID = $request->input('kelas');
        
        if (is_array($ruangID)) {
            $ruangID = $ruangID[0];
        }
        if (is_array($kelasID)) {
            $kelasID = $kelasID[0];
        }

        if ($ruangID) {
            $validatedData['ruang_id'] = $ruangID;
        }

        if ($kelasID) {
            $validatedData['kelas_id'] = $kelasID;
        }

        // Lakukan update hanya sekali
        $jadwal->update($validatedData);

        return redirect()->route('jadwal.index')->with('success', 'jadwal "'.$jadwal->name.'" berhasil diupdate');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'jadwal "'.$jadwal->name.'" sukses dihapus.');
    }
}

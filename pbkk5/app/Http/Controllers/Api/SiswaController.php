<?php

namespace App\Http\Controllers\Api;

use App\Models\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SiswaResource;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index(){
        $siswas = Siswa::get();
        if($siswas->count() > 0){
            return SiswaResource::collection($siswas);
        }else{
            return response()->json(['message' => 'No record available'], 200);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nama_depan' => 'required|string|max:20',
            'nama_belakang' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:perempuan,laki-laki',
            'email' => 'required|string|email',
            'no_telp' => 'required|string|max:15',
            'nama_ortu' => 'required|string|max:20',
            'no_telp_ortu' => 'required|string|max:15',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are mandatory',
                'error' =>$validator->errors(),
            ], 422);
        }

        $siswa = Siswa::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'nama_ortu' => $request->nama_ortu,
            'no_telp_ortu' => $request->no_telp_ortu,
        ]);

        return response()->json([
            'message' => 'siswa created successfully',
            'data' => new SiswaResource($siswa)
        ], 200);
    }

    public function show(Siswa $siswa){
        return new SiswaResource($siswa);
    }

    public function update(Request $request, kelas $kelas){
        $validator = Validator::make($request->all(),[
            'nama_depan' => 'required|string|max:20',
            'nama_belakang' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:perempuan,laki-laki',
            'email' => 'required|string|email',
            'no_telp' => 'required|string|max:15',
            'nama_ortu' => 'required|string|max:20',
            'no_telp_ortu' => 'required|string|max:15',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are mandatory',
                'error' =>$validator->errors(),
            ], 422);
        }

        $siswa = Siswa::update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'nama_ortu' => $request->nama_ortu,
            'no_telp_ortu' => $request->no_telp_ortu,
        ]);

        return response()->json([
            'message' => 'siswa updated successfully',
            'data' => new SiswaResource($siswa)
        ], 200);
    }

    public function destroy(Siswa $siswa){
        $siswa->delete();
        return response()->json([
            'message' => 'siswa deleted successfully',
        ], 200);
    }
}

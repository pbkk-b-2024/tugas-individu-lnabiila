<?php

namespace App\Http\Controllers\Api;

use App\Models\Kelas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\KelasResource;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index(){
        $kelas = Kelas::get();
        if($kelas->count() > 0){
            return KelasResource::collection($kelas);
        }else{
            return response()->json(['message' => 'No record available'], 200);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are mandatory',
                'error' =>$validator->errors(),
            ], 422);
        }

        $kelas = Kelas::create([
            'nama' => $request->nama,
        ]);

        return response()->json([
            'message' => 'kelas created successfully',
            'data' => new KelasResource($kelas)
        ], 200);
    }

    public function show(Kelas $kelas){
        return new KelasResource($kelas);
    }

    public function update(Request $request, Kelas $kelas){
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are mandatory',
                'error' =>$validator->errors(),
            ], 422);
        }

        $kelas->update([
            'nama' => $request->nama,
        ]);

        return response()->json([
            'message' => 'kelas updated successfully',
            'data' => new KelasResource($kelas)
        ], 200);
    }

    public function destroy(Kelas $kelas){
        $kelas->delete();
        return response()->json([
            'message' => 'kelas deleted successfully',
        ], 200);
    }
}
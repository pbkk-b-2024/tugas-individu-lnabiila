<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Number;

class Pertemuan1Controller extends Controller
{
    
    public function genapGanjil(Request $request){
        $numberDetails = [];
        if ($request->has('n')) {
            $validatedData = $request->validate([
                'n' => 'required|integer|min:1',
            ]);

            $n = $validatedData['n'];
            $numberDetails = Number::getGenapGanjil($n); //
        }
        return view('tugas1.genap-ganjil',compact('numberDetails'));
    }

    public function bilanganPrima(Request $request){
        $numberDetails = [];
        if ($request->has('n')) {
            $validatedData = $request->validate([
                'n' => 'required|integer|min:1',
            ]);

            $n = $validatedData['n'];
            $numberDetails = Number::getPrima($n);
        }
        return view('tugas1.bilangan-prima',compact('numberDetails'));
    }

    public function fibonacci(Request $request){
        $numberDetails = [];
        if ($request->has('n')) {
            $validatedData = $request->validate([
                'n' => 'required|integer|min:1',
            ]);

            $n = $validatedData['n'];
            $numberDetails = Number::getFibonaci($n);
        }

        return view('tugas1.fibonacci',compact('numberDetails'));
    }
    
    public function param1($param1 = ''){
        $data['param1'] = $param1;
        return view('tugas1.param1',compact('data'));
    }

    public function param2($param1 ='', $param2 =''){
        $data['param1'] = $param1;
        $data['param2'] = $param2;
        return view('tugas1.param2',compact('data'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OutletController extends Controller
{
    public function dashboard(){
        $outlets = Outlet::all();
        return view('dashboard', compact('outlets'));
    }

public function index(Request $request)
{
    $search = $request->input('search');

    $outlets = Outlet::query();

    if ($search) {
        $outlets->where('name', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%');
    }

    $outlets = $outlets->get(); // Ambil semua hasil pencarian

    return view('outlet.index', compact('outlets'));
}

    public function create()
    {
        return view('outlet.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'open_hour' => 'required',
                'close_hour' => 'required'
            ],
            [
                'name.required' => 'Name can\'t be empty!',
                'address.required' => 'Address can\'t be empty!',
                'open_hour.required' => 'Select the open time!',
                'close_hour.required' => 'Select the close time!'
            ]
        );

        Outlet::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'open_hour' => $request->input('open_hour'),
            'close_hour' => $request->input('close_hour')
        ]);

        return redirect('/outlet');
    }

public function show($id)
{
    $outlet = Outlet::findOrFail($id);
    return view('outlet.show', compact('outlet')); // Gunakan view 'outlet.show'
}


    public function edit($id)
    {
        $outlet = Outlet::findOrFail($id);
        return view('outlet.edit', compact('outlet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'open_hour' => 'required',
                'close_hour' => 'required'
            ],
            [
                'name.required' => 'Name can\'t be empty!',
                'address.required' => 'Address can\'t be empty!',
                'open_hour.required' => 'Select the open time!',
                'close_hour.required' => 'Select the close time!'
            ]
        );

        $outlet = Outlet::findOrFail($id);
        $outlet->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'open_hour' => $request->input('open_hour'),
            'close_hour' => $request->input('close_hour')
        ]);

        return redirect('/outlet/' . $id);
    }

    public function destroy($id)
    {
        Outlet::findOrFail($id)->delete();
        return redirect('/outlet');
    }
}

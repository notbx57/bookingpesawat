<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Admin; 
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $flights = Admin::all(); 
        return view('admin.dashboard', compact('flights'));
    }

    public function create()
    {
        return view('admin.flights.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_maskapai' => 'required',
            'dari' => 'required',
            'ke' => 'required',
            'tanggal' => 'required|date',
            'harga' => 'required|numeric',
        ]);

        Admin::create($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Flight created successfully.');
    }

    public function show(Admin $flight)
    {
        return view('admin.flights.show', compact('flight'));
    }

    public function edit($id)
    {
        $flight = Admin::findOrFail($id);
        return view('admin.flights.edit', compact('flight'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_maskapai' => 'required',
            'dari' => 'required',
            'ke' => 'required',
            'tanggal' => 'required|date',
            'harga' => 'required|numeric',
        ]);

        $flight = Admin::findOrFail($id);
        $flight->update($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Flight updated successfully.');
    }

    public function destroy($id)
    {
        $flight = Admin::findOrFail($id);
        $flight->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Flight deleted successfully.');
    }

}

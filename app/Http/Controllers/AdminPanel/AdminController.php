<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'harga' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $flightData = $request->all();

        if ($image = $request->file('image')) {
            $path = $image->store('public/flight-images');
            $flightData['image_path'] = $path;
        }

        Admin::create($flightData);

        return redirect()->route('admin.dashboard')->with('success', 'Admin created successfully.');
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
        $validatedData = $request->validate([
            'nama_maskapai' => 'required',
            'dari' => 'required',
            'ke' => 'required',
            'harga' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $flight = Admin::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($flight->image_path && Storage::exists($flight->image_path)) {
                Storage::delete($flight->image_path);
            }

            $image = $request->file('image');
            $imagePath = $image->store('public/flight-images');
            $validatedData['image_path'] = $imagePath;
        }

        $flight->update($validatedData);

        return redirect()->route('admin.dashboard')->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        $flight = Admin::findOrFail($id);

        if ($flight->image_path && Storage::exists($flight->image_path)) {
            Storage::delete($flight->image_path);
        }

        $flight->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Admin deleted successfully.');
    }
}

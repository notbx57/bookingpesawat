<?php

namespace App\Http\Controllers\UserPanel;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\UserDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function booking($id)
    {
        $flight = Admin::findOrFail($id);
        $userEmail = Auth::user()->email;
        $userName = Auth::user()->name;

        return view('booking_form', compact('flight', 'userEmail', 'userName'));
    }

    public function bookFlight(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required',
            'phonenumber' => 'required',
            'tanggal' => 'required|date',
            'jumlah_penumpang' => 'required|integer|min:1',
            'maskapai' => 'required',
            'total_price' => 'required|numeric',
            'email' => 'required',
        ]);

        $userDetail = new UserDetail([
            'user_id' => auth()->id(),
            'flight_id' => $request->input('flight_id'),
            'fullname' => $validatedData['fullname'],
            'phonenumber' => $validatedData['phonenumber'],
            'dari' => $request->input('dari'),
            'ke' => $request->input('ke'),
            'tanggal' => $validatedData['tanggal'],
            'maskapai' => $validatedData['maskapai'],
            'jumlah_penumpang' => $validatedData['jumlah_penumpang'],
            'total_price' => $validatedData['total_price'],
            'email' => $validatedData['email'],
        ]);

        $userDetail->save();

        return redirect()->route('dashboard')->with('success', 'Flight booked successfully!');
    }
}

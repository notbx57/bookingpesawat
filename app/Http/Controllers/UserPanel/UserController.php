<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class UserController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    }

    public function tujuan()
    {
        $flights = Admin::all();
        return view('tujuan', compact('flights'));
    }

    public function tickets(){
        return view('bookingticket');
    }

}

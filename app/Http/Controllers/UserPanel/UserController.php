<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class UserController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            $userdetails = UserDetail::all();
            return view('dashboard', compact('userdetails'));
        }
    }

    public function tujuan()
    {
        $flights = Admin::all();


        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return view('tujuan', compact('flights'));
        }
    }

    public function orders($user_id = null)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($user_id === null) {
                $user_id = $user->id;
            }

            $orders = UserDetail::where('user_id', $user_id)->get();
            return view('bookingticket', compact('orders'));
        }

        return redirect()->route('login');
    }
}

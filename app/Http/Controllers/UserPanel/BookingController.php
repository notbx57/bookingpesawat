<?php

namespace App\Http\Controllers\UserPanel;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\UserDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;

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
        return redirect()->route('dashboard')->with('success', 'Order Success, Silakan Cek Orders!');
    }


    public function pay(UserDetail $order)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'name' => $order->fullname,
                'email' => $order->email,
                'phone' => $order->phonenumber,
            ),
        );

        $snapToken = Snap::getSnapToken($params);
        $userdetail = UserDetail::all();
        return view('payment', compact('snapToken', 'order', 'userdetail'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = UserDetail::findOrFail($request->order_id);
                $order->update(['status' => 'Paid']);
            }
        }
    }

    public function invoice($id)
    {
        $order = UserDetail::find($id);
        return view('invoice', compact('$order'));
    }
}

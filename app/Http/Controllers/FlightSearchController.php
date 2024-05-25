<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightSearchController extends Controller
{
    public function searchFlights(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $departureDate = $request->input('departureDate');

        // Konversi format tanggal
        $departureDate = date('Y-m-d', strtotime($departureDate));

        $flights = Flight::where('dari', $origin)
            ->where('ke', $destination)
            ->where('tanggal', '>=', $departureDate)
            ->get();

        return view('searchflight', compact('flights'));
    }


    public function getCities()
    {
        $cities = Flight::select('dari', 'ke')->distinct()->get();
        return response()->json($cities);
    }
}

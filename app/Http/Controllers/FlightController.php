<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::query()->with(['status', 'airportFrom', 'airportTo', 'departureTimezone', 'arrivalTimezone'])
            ->paginate(10);

        return view('flights.index', [
            'flights' => $flights,
        ]);
    }
}

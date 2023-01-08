<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightRequest;
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

    public function create()
    {
        $flight = new Flight();

        return view('flights.create', [
            'flight' => $flight,
        ]);
    }

    public function store(FlightRequest $request)
    {

    }

    public function edit($flight)
    {
        $flight = Flight::query()->findOrFail($flight);

        return view('flights.edit', [
            'flight' => $flight,
        ]);
    }

    public function update(FlightRequest $request)
    {

    }

    public function delete()
    {

    }
}

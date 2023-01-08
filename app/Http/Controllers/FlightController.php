<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightRequest;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\FlightStatus;
use App\Models\Timezone;
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
            'airports' => Airport::query()->orderBy('name', 'asc')->get(),
            'statuses' => FlightStatus::all(),
            'timezones' => Timezone::query()->orderBy('name2', 'asc')->get(),
        ]);
    }

    public function store(FlightRequest $request)
    {
        $flight = new Flight();

    }

    public function edit($flight)
    {
        return view('flights.edit', [
            'flight' => Flight::query()->findOrFail($flight),
            'airports' => Airport::query()->orderBy('name', 'asc')->get(),
            'statuses' => FlightStatus::all(),
            'timezones' => Timezone::query()->orderBy('name2', 'asc')->get(),
        ]);
    }

    public function update(FlightRequest $request, $flight)
    {

    }

    public function delete()
    {

    }
}

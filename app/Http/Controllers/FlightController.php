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
            ->orderBy('departure_time', 'asc')
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
        $this->saveFlight($request, $flight);
        return redirect()->route('flights.index')->with('success', __('general.flight_created'));
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
        $flight = Flight::query()->findOrFail($flight);
        $this->saveFlight($request, $flight);
        return redirect()->route('flights.index')->with('success', __('general.flight_updated'));
    }

    public function destroy($flight)
    {
        Flight::query()->where('id', $flight)->delete();
        return redirect()->route('flights.index')->with('success', __('general.flight_deleted'));
    }

    protected function saveFlight(FlightRequest $request, Flight $flight)
    {
        $flight->code = $request->code;
        $flight->status_id = $request->status_id;
        $flight->airport_from = $request->airport_from;
        $flight->airport_to = $request->airport_to;
        $flight->departure_time = $request->departure_time;
        $flight->departure_timezone = $request->departure_timezone;
        $flight->arrival_time = $request->arrival_time;
        $flight->arrival_timezone = $request->arrival_timezone;
        $flight->passengers = $request->passengers;
        $flight->save();
    }
}

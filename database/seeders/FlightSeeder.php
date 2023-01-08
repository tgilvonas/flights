<?php

namespace Database\Seeders;

use App\Models\Airport;
use App\Models\Flight;
use App\Models\FlightStatus;
use App\Models\Timezone;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newYorkTimezone = Timezone::query()->where('name', '=', 'America/New_York')->first();
        $vilniusTimezone = Timezone::query()->where('name', '=', 'Europe/Vilnius')->first();

        for ($i=1; $i<=20; $i++) {
            $flightStatus = FlightStatus::query()->inRandomOrder()->first();

            $carbon = new Carbon();

            $airport1 = Airport::query()->where('id', '<', 100)
                ->inRandomOrder()
                ->first();
            $airport2 = Airport::query()->where('id', '>', 100)
                ->inRandomOrder()
                ->first();

            $flight = new Flight();
            $flight->status_id = $flightStatus->id;
            $flight->airport_from = $airport1->id;
            $flight->airport_to = $airport2->id;
            $flight->departure_time = $carbon->addDays(rand(0, 30))->addHours(rand(0, 23))->format('Y-m-d H:i:s');
            $flight->departure_timezone = $vilniusTimezone->id;
            $flight->arrival_time = $carbon->addHours(rand(5, 6))->format('Y-m-d H:i:s');
            $flight->arrival_timezone = $newYorkTimezone->id;
            $flight->passengers = rand(0, 300);
            $flight->save();
        }

        for ($i=1; $i<=20; $i++) {
            $flightStatus = FlightStatus::query()->inRandomOrder()->first();

            $carbon = new Carbon();

            $airport1 = Airport::query()->where('id', '<', 100)
                ->inRandomOrder()
                ->first();
            $airport2 = Airport::query()->where('id', '>', 100)
                ->inRandomOrder()
                ->first();

            $flight = new Flight();
            $flight->status_id = $flightStatus->id;
            $flight->airport_from = $airport2->id;
            $flight->airport_to = $airport1->id;
            $flight->departure_time = $carbon->addDays(rand(0, 30))->addHours(rand(0, 23))->format('Y-m-d H:i:s');
            $flight->departure_timezone = $newYorkTimezone->id;
            $flight->arrival_time = $carbon->addHours(rand(5, 6))->format('Y-m-d H:i:s');
            $flight->arrival_timezone = $vilniusTimezone->id;
            $flight->passengers = rand(0, 300);
            $flight->save();
        }
    }
}

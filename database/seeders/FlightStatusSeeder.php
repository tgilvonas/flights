<?php

namespace Database\Seeders;

use App\Models\FlightStatus;
use Illuminate\Database\Seeder;

class FlightStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Scheduled',
            'Canceled',
            'Delayed',
            'Arrived',
        ];

        foreach ($statuses as $status) {
            $flightStatus = new FlightStatus();
            $flightStatus->name = $status;
            $flightStatus->save();
        }
    }
}

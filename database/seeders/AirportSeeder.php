<?php

namespace Database\Seeders;

use App\Models\Airport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Monolog\Handler\NativeMailerHandler;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = 0;
        $fileHandle = fopen(base_path('database/data/airport-codes.csv'), "r");
        if ($fileHandle !== false) {
            while (!feof($fileHandle)) {
                $data = fgetcsv($fileHandle, 2048, ",");
                if (in_array($data[1], ['small_airport', 'international_airport', 'airport'])) {
                    $airport = new Airport();
                    $airport->code = $data[0];
                    $airport->name = $data[2];
                    $airport->municipality = $data[7];
                    $airport->country = $data[5];
                    $airport->save();
                    //dump($data);
                    $n++;
                    if ($n > 99) {
                        break;
                    }
                }
            }
        }
        fclose($fileHandle);

        $airport = new Airport();
        $airport->code = 'VNO';
        $airport->name = 'Vilnius International Airport';
        $airport->municipality = 'Vilnius';
        $airport->country = 'LT';
        $airport->save();

        $airport = new Airport();
        $airport->code = 'KUN';
        $airport->name = 'Kaunas International Airport';
        $airport->municipality = 'Kaunas';
        $airport->country = 'LT';
        $airport->save();
    }
}

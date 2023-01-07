<?php

namespace Database\Seeders;

use App\Models\Timezone;
use Illuminate\Database\Seeder;

class TimezoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include_once base_path('database/data/timezones.php');
        foreach ($timezones ?? [] as $name => $name2) {
            $timezone = new Timezone();
            $timezone->name = $name;
            $timezone->name_normalized = str_replace('_', ' ', $name);
            $timezone->name2 = $name2;
            $timezone->save();
        }
    }
}

<?php

namespace Database\Seeders;

use Franz\Airports\Database\AirportSeeds;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class AirportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $airportSeeds = new AirportSeeds();
        $airportSeeds->addData();
    }
}

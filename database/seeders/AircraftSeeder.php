<?php

namespace Database\Seeders;

use Franz\Airplanes\Database\AircraftSeeds;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AircraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AircraftSeeds::seed();
    }
}

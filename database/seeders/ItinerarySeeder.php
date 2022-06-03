<?php

namespace Database\Seeders;

use Franz\Fligths\Database\ItinerarySeeds;
use Franz\Fligths\Repositories\ItineraryRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class ItinerarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $repository = new ItineraryRepository();
        $seeder = new ItinerarySeeds($repository);
        $seeder->runSeeds();
    }
}

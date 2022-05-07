<?php

namespace Franz\Airplanes\Factory;

use Franz\Airplanes\Models\Aircraft;
use Franz\Airplanes\ValueObjects\AircraftBrand;
use Franz\Airplanes\ValueObjects\AircraftModel;
use Franz\Airplanes\ValueObjects\AircraftState;
use Franz\Airplanes\ValueObjects\LoadCapacity;
use Franz\Airplanes\ValueObjects\Seats;
use Franz\Airplanes\ValueObjects\TankCapacity;

class AircraftFactory
{
    public static function createAircraft(array $data = []){
        $brand = new AircraftBrand($data["brand"]);
        $model = new AircraftModel($data["model"]);
        $state = new AircraftState($data["state"]);
        $loadCapacity = new LoadCapacity($data["loadCapacity"]);
        $tankCapacity = new TankCapacity($data["tankCapacity"]);
        $seatNumber = new Seats($data["seatNumber"]);
        $parkingAirport = $data["parkingAirport"];
        $seats = $data["seats"];
        $data = new Aircraft($brand,$model,$state,$loadCapacity,$seatNumber,$tankCapacity,$parkingAirport,$seats);
        return $data;
    }

}

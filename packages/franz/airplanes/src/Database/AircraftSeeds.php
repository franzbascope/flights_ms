<?php

namespace Franz\Airplanes\Database;

use Franz\Airplanes\Factory\AircraftFactory;
use Franz\Airplanes\Factory\AircraftSeatFactory;

class AircraftSeeds
{
    public static function seed(){
        $seats = [
            ["class" => "poor","code" => "abc"]
            ,["class" => "poor","code" => "bca"]
        ];
        $aircrafts = [
            [
                "brand" => "toyota",
                "model" =>"tesla",
                "state" => "ready",
                "loadCapacity" => 1000,
                "tankCapacity" => 1000,
                "seatNumber" => 20,
                "parkingAirport" => "12312312312",
                "seats" => $seats
            ]
        ];
        foreach ($aircrafts as $aircraft){
            $validatedSeats = [];
            foreach ($seats as $seat){
                $validatedSeats[]=  AircraftSeatFactory::createAircraftSeat($seat)->toArray();
            }
            $aircraft["seats"] = $validatedSeats;
            $aircraft = AircraftFactory::createAircraft($aircraft)->serialize();
            $db = new CacheDatabase();
            $dbAircrafts =  $db->getAircrafts();
            $dbAircrafts[] = $aircraft;
            $db->saveAircrafts($dbAircrafts);
        }

    }

}

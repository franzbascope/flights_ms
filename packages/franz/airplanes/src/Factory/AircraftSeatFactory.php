<?php

namespace Franz\Airplanes\Factory;

use Franz\Airplanes\Models\AircraftSeat;
use Franz\Airplanes\ValueObjects\SeatClass;
use Franz\Airplanes\ValueObjects\SeatCode;

class AircraftSeatFactory
{
    /**
     * @throws \Exception
     */
    public static function createAircraftSeat($data){
        $class = new SeatClass($data["class"]);
        $code = new SeatCode($data["code"]);
        return new AircraftSeat($class,$code);
    }

}

<?php

namespace Franz\Airports\Factories;

use Franz\Airports\ValueObjects\AiportCityCode;
use Franz\Airports\ValueObjects\AirportCode;
use Franz\Airports\ValueObjects\AirportName;

/**
 *
 */
class AirportFactory
{

    /**
     * @param array $data
     * @return \Franz\Airports\Models\Airport
     * @throws \Exception
     */
    public static function createAirport(array $data){
        $cityCode = new AiportCityCode($data["cityCode"]);
        $airportCode = new AirportCode($data["code"]);
        $name = new AirportName($data["name"]);
        return new \Franz\Airports\Models\Airport($cityCode,$airportCode,$name);
    }

}

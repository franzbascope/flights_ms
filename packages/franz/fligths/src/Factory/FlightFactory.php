<?php

namespace Franz\Fligths\Factory;

use Carbon\Carbon;
use Franz\Fligths\Airport\AirportClient;
use Franz\Fligths\Models\Flight;

class FlightFactory
{
    public static function createFlight(string $airport_code,array $data){
        $client = new AirportClient();
        $code = $client->getFlightCode($airport_code);
        $airplane = $client->getPlaneForFlight($code);
        $startDateTime = Carbon::parse($data["startDateTime"]);
        $endDateTime = Carbon::parse($data["endDateTime"]);
        return new Flight($code,$startDateTime,$endDateTime,$data["crew"],$airplane);
    }

}

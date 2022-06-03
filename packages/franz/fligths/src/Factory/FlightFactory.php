<?php

namespace Franz\Fligths\Factory;

use Carbon\Carbon;
use Franz\Fligths\Airport\IAirportClient;
use Franz\Fligths\Models\Flight;

class FlightFactory
{
    public IAirportClient $airportClient;

    /**
     * @param IAirportClient $airportClient
     */
    public function __construct(IAirportClient $airportClient)
    {
        $this->airportClient = $airportClient;
    }

    public function createFlight(string $airport_code,array $data){
        $code = $this->airportClient->getFlightCode($airport_code);
        $airplane = $this->airportClient->getPlaneForFlight($code);
        $startDateTime = Carbon::parse($data["startDateTime"]);
        $endDateTime = Carbon::parse($data["endDateTime"]);
        return new Flight($code,$startDateTime,$endDateTime,$data["crew"],$airplane);
    }

}

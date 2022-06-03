<?php

namespace Franz\Fligths\Models;

use Franz\Fligths\Airport\AirportClient;
use Franz\Fligths\Factory\FlightProgramFactory;
use Franz\Shared\Entity;

class Itinerary extends Entity
{
    public string $source_code;
    public string $destiny_code;
    public array $flight_programs;

    /**
     * @param string $source
     * @param string $destiny
     * @param array $flight_programs
     * @throws \Exception
     */
    public function __construct(string $source, string $destiny, array $flight_programs)
    {
        parent::__construct();
//        $this->airportClient = new AirportClient();
//        // validate if airports exist
//        $this->airportClient->getAirportByCityCode($source);
//        $this->airportClient->getAirportByCityCode($destiny);

        $this->source_code = $source;
        $this->destiny_code = $destiny;

        // validate flight programs
        if(count($flight_programs) <= 0)
            throw new \Exception("Must have at least one flight profram");
        $this->flight_programs = [];
        if($this->source_code !== $flight_programs[0]["source_code"])
            throw new \Exception("Itinerary source must match with flight program");
        if($this->destiny_code !== $flight_programs[count($flight_programs)-1]["destiny_code"])
            throw new \Exception("Itinerary destiny must match with flight program");
        foreach($flight_programs as $flight_program){
            $validated_flight_program = FlightProgramFactory::create($flight_program);
            $this->flight_programs[] = $validated_flight_program->serialize();
        }
    }

    public function serialize()
    {
        return [
            "uuid" => $this->getUuid(),
            "source_code" => $this->source_code,
         //   "source" => $this->airportClient->getAirportByCityCode($this->source_code),
            "destiny_code" => $this->destiny_code,
        //    "destiny" => $this->airportClient->getAirportByCityCode($this->destiny_code),
            "flight_programs" => $this->flight_programs
        ];
    }

}

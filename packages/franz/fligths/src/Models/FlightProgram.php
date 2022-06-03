<?php

namespace Franz\Fligths\Models;

use Franz\Fligths\Airport\AirportClient;
use Franz\Fligths\Airport\IAirportClient;
use Franz\Shared\Entity;

class FlightProgram extends Entity
{
    public string $source_code;
    public string $destiny_code;
    public Flight $flight;
    private IAirportClient $airportClient;

    /**
     * @param string $source_code
     * @param string $destiny_code
     */
    public function __construct(string $source_code, string $destiny_code, IAirportClient $airportClient)
    {
        parent::__construct();
        $this->airportClient = $airportClient;
        // validate if airports exist
        // TODO: move this validation with cqrs do nit mix business rules
        $this->airportClient->getAirportByCityCode($source_code);
        $this->airportClient->getAirportByCityCode($destiny_code);

        $this->source_code = $source_code;
        $this->destiny_code = $destiny_code;
    }

    public function serialize()
    {
        return [
            "uuid" => $this->getUuid(),
            "source_code" => $this->source_code,
            "destiny_code" => $this->destiny_code,
        ];
    }

}

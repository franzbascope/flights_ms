<?php

namespace Franz\Fligths\Models;

use DateTime;
use Franz\Fligths\Airport\AirportClient;
use Franz\Shared\Entity;

class Flight extends Entity
{
    public string $flight_number;
    public DateTime $startDateTime;
    public DateTime $endDateTime;
    public array $crew;
    public array $airplane;

    /**
     * @param string $flight_number
     * @param DateTime $start
     * @param DateTime $end
     * @param array $crew
     * @param array $airplane
     */
    public function __construct(string $flight_number, DateTime $start, DateTime $end, array $crew, array $airplane)
    {
        parent::__construct();
        $this->flight_number = $flight_number;
        $this->startDateTime = $start;
        $this->endDateTime = $end;
        $this->crew = $crew;
        $this->airplane = $airplane;
    }

    public function serialize()
    {
        return [
            "uuid" => $this->getUuid(),
            "flight_number" => $this->flight_number,
            "startDateTime" => $this->startDateTime->format("Y-m-d H:i"),
            "endDateTime" => $this->endDateTime->format("Y-m-d H:i"),
            "crew" => $this->crew,
            "airplane" => $this->airplane,
        ];
    }


}

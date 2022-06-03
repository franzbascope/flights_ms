<?php

namespace Franz\Fligths\Airport;

interface IAirportClient
{
    public function getAirportByCityCode(string $code);

    public function getFlightCode(string $code);

    public function getPlaneForFlight(string $flight_code);

}

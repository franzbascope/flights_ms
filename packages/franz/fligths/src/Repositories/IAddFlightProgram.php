<?php

namespace Franz\Fligths\Repositories;

interface IAddFlightProgram
{
    public function addFlightProgram(string $itinerary_uuid,array $flight_program): array;

}

<?php

namespace Franz\Fligths\Repositories;

interface IAddFlight
{
    public function addFlight(string $itinerary_uuid, string $flight_program_uuid,array $data);

}

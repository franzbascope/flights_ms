<?php

namespace Franz\Fligths\Factory;

class ItineraryFactory
{
    /**
     * @throws \Exception
     */
    public static function create($data)
    {
        return (new \Franz\Fligths\Models\Itinerary($data["source_code"], $data["destiny_code"], $data["flight_programs"] ?? []));
    }

}

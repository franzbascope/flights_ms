<?php

namespace Franz\Fligths\Repositories;

use Franz\Fligths\Database\CacheDatabase;
use Franz\Fligths\Database\IDatabase;
use Franz\Fligths\Factory\ItineraryFactory;
use Illuminate\Support\Facades\Cache;

class ItineraryRepository implements IItinieraryRepository
{
    private $database;

    public function __construct(IDatabase $database = null)
    {
        if ($database === null)
            $this->database = new CacheDatabase();
        else
            $this->database = $database;
    }


    public function create(array $data): array
    {
        $itineraries = $this->database->getItineraries();
        $newItinerary = ItineraryFactory::create($data)->serialize();
        $itineraries[] = $newItinerary;
        $this->database->setItinieraries($itineraries);
        return $newItinerary;
    }

    public function get(array $filters): array
    {
        return $this->database->getItineraries();
    }

    public function find(string $uuid): array
    {
        return collect($this->database->getItineraries())->firstOrFail(function ($itinerary) use ($uuid) {
            return $itinerary["uuid"] === $uuid;
        });
    }

    public function setFlightPrograms(string $uuid, array $flight_programs): array
    {
        $itinerary = $this->find($uuid);
        $itinerary["flight_programs"] = $flight_programs;
        $itineraries = $this->database->getItineraries();
        $this->database->setItinieraries(collect($itineraries)->map(function ($iterate) use ($itinerary) {
            if ($iterate["uuid"] === $itinerary["uuid"])
                return $itinerary;
            return $iterate;

        })->toArray());
        return $itinerary;
    }

    public function update(array $data): array
    {

        $itineraries = $this->database->getItineraries();
        $updatedItineraries = collect($itineraries)->map(function ($item) use ($data) {
            if ($item["uuid"] === $data["uuid"])
                return $data;
            return $item;
        })->toArray();
        $this->database->setItinieraries($updatedItineraries);
        return $updatedItineraries;
    }
}

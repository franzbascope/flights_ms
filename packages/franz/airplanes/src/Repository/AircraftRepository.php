<?php

namespace Franz\Airplanes\Repository;



use Franz\Airplanes\Database\CacheDatabase;
use Franz\Airplanes\Factory\AircraftFactory;

class AircraftRepository implements IAircraftRepository
{
    private $database;

    /**
     * @param $database
     */
    public function __construct()
    {
        $this->database = new CacheDatabase();
    }


    public function get($filters = []): array
    {
       return $this->database->getAircrafts();
    }

    public function edit($uuid): array
    {
        return collect($this->database->getAircrafts())->first(function ($data) use($uuid){
           return $data["uuid"] === $uuid;
        }) ?? [];
    }

    public function create($data = []): array
    {
        $aircraft = AircraftFactory::createAircraft($data)->serialize();
        $aircrafts =  $this->database->getAircrafts();
        $aircrafts[] = $aircraft;
        $this->database->saveAircrafts($aircrafts);

    }
}

<?php

namespace Franz\Airports\Repositories;

use Franz\Airports\Database\CacheDatabase;
use Franz\Airports\Dto\AirportDto;
use Franz\Airports\Factories\AirportFactory;
use Illuminate\Support\Facades\Cache;

class AirportRepository implements IAirportRepository
{

    private $database;

    public function __construct()
    {
        $this->database = CacheDatabase::initialize();
    }


    /**
     * @throws \Exception
     */
    public function create(array $data): array
    {
        $airport = AirportFactory::createAirport($data)->serialize();
        $airports = $this->database->getAirports();
        $airports[] = $airport;
        $this->database->saveAirports($airports);
        return $airport;
    }

    public function get($filters = []): array
    {
        return $this->database->getAirports();
    }

    public function edit(string $uuid): array
    {
        $airports = $this->database->getAirports();
        return collect($airports)->firstOrFail(function ($data) use($uuid){
            return $data["uuid"] == $uuid;
        }) ;
    }

    public function findByCityCode(string $code): array
    {
        $airports = $this->database->getAirports();
        return collect($airports)->firstOrFail(function ($data) use($code){
                return $data["cityCode"] == $code;
            }) ?? [];
    }
}

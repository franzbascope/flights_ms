<?php

namespace Franz\Airports\Database;

use Franz\Airports\Repositories\AirportRepository;
use Franz\Airports\Repositories\IAirportRepository;

class AirportSeeds
{
    private IAirportRepository $repository;

    public function __construct()
    {
       $this->repository = new AirportRepository();
    }

    public function addData(){
        $airport1 = ["code" => "12345", "cityCode" => "VVI", "name" => "Viru Viru"];
        $airport2 = ["code" => "54321", "cityCode" => "CBB", "name" => "Cochabamba"];
        $airport3 = ["code" => "98753", "cityCode" => "SUC", "name" => "Sucre"];
        $airport4 = ["code" => "54322", "cityCode" => "TAJ", "name" => "Tarija"];
        $airport5 = ["code" => "54122", "cityCode" => "CHA", "name" => "Chapare"];
        $this->repository->create($airport1);
        $this->repository->create($airport2);
        $this->repository->create($airport3);
        $this->repository->create($airport4);
        $this->repository->create($airport5);
    }
}

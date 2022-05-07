<?php

namespace Franz\Airports\Http\Controllers;

use Franz\Airports\Repositories\IAirportRepository;

class AirportController
{

    private IAirportRepository $repository;

    public function __construct(IAirportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(\Illuminate\Http\Request $data){
        return $this->repository->get();
    }

    public function edit($uuid){
        return $this->repository->edit($uuid);

    }

    public function findByCityCode($code){
        return $this->repository->findByCityCode($code);
    }

    public function generateFlightCode($code){
        $airport = $this->repository->findByCityCode($code);
        if(!$airport)
            throw new \Exception("Invalid airport");
        return ["flight_code" => $airport["cityCode"].$this->generateRandomString(3)];
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}

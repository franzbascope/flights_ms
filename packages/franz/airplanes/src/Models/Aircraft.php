<?php

namespace Franz\Airplanes\Models;

use Franz\Airplanes\ValueObjects\AircraftBrand;
use Franz\Airplanes\ValueObjects\AircraftModel;
use Franz\Airplanes\ValueObjects\AircraftState;
use Franz\Airplanes\ValueObjects\LoadCapacity;
use Franz\Airplanes\ValueObjects\Seats;
use Franz\Airplanes\ValueObjects\TankCapacity;
use Franz\Shared\Entity;

class Aircraft extends Entity
{
    public AircraftBrand $brand;
    public AircraftModel $model;
    public AircraftState $state;
    public LoadCapacity $loadCapacity;
    public Seats $seatNumber;
    public TankCapacity $tankCapacity;
    public string $parkingAirport;
    public array $seats;

    /**
     * @param AircraftBrand $brand
     * @param AircraftModel $model
     * @param AircraftState $state
     * @param LoadCapacity $loadCapacity
     * @param Seats $seatNumber
     * @param TankCapacity $tankCapacity
     * @param string $parkingAirport
     * @param array $seats
     */
    public function __construct(AircraftBrand $brand, AircraftModel $model, AircraftState $state, LoadCapacity $loadCapacity
        , Seats $seatNumber
        , TankCapacity $tankCapacity, string $parkingAirport, array $seats)
    {
        parent::__construct();
        $this->brand = $brand;
        $this->model = $model;
        $this->state = $state;
        $this->loadCapacity = $loadCapacity;
        $this->seatNumber = $seatNumber;
        $this->tankCapacity = $tankCapacity;
        $this->parkingAirport = $parkingAirport;
        $this->seats = $seats;
    }

    public function serialize(){
        return [
            "brand" => $this->brand->getValue(),
            "model" => $this->model->getValue(),
            "state" => $this->state->getValue(),
            "loadCapacity" => $this->loadCapacity->getValue(),
            "seatNumber" => $this->seatNumber->getValue(),
            "tankCapacity" => $this->tankCapacity->getValue(),
            "parkingAirport" => $this->parkingAirport,
            "seats" => $this->seats,
            "uuid" => $this->getUuid()
        ];
    }


}

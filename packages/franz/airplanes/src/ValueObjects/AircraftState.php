<?php

namespace Franz\Airplanes\ValueObjects;


use Franz\Airplanes\Rules\AircraftStateRule;
use Franz\Shared\ValidationRule;

class AircraftState extends ValidationRule
{


    public function __construct($value)
    {
        $this->rules = [ new AircraftStateRule()];
        parent::__construct($value);
    }
}

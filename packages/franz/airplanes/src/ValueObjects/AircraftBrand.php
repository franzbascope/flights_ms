<?php

namespace Franz\Airplanes\ValueObjects;

use Franz\Airplanes\Rules\AircraftBrandRule;
use Franz\Shared\ValidationRule;

class AircraftBrand extends ValidationRule
{

    public function __construct($value)
    {
        $this->rules = [ new AircraftBrandRule()];
        parent::__construct($value);
    }
}

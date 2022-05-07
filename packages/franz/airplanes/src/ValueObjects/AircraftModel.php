<?php

namespace Franz\Airplanes\ValueObjects;

use Franz\Airplanes\Rules\AircraftModelRule;
use Franz\Shared\ValidationRule;

class AircraftModel extends ValidationRule
{

    public function __construct($value)
    {
        $this->rules = [ new AircraftModelRule()];
        parent::__construct($value);
    }
}

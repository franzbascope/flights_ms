<?php

namespace Franz\Airplanes\ValueObjects;

use Franz\Airplanes\Rules\SeatCodeRule;
use Franz\Shared\ValidationRule;

class SeatCode extends ValidationRule
{

    public function __construct($value)
    {
        $this->rules = [new SeatCodeRule()];
        parent::__construct($value);
    }

}

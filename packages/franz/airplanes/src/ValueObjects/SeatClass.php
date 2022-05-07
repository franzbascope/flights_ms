<?php

namespace Franz\Airplanes\ValueObjects;


use Franz\Airplanes\Rules\SeatClassRule;
use Franz\Shared\ValidationRule;

class SeatClass extends ValidationRule
{

    public function __construct($value)
    {
        $this->rules = [new SeatClassRule()];
        parent::__construct($value);
    }

}

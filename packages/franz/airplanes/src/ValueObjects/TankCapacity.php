<?php

namespace Franz\Airplanes\ValueObjects;

use Franz\Shared\Rules\DecimalAndPositiveRule;
use Franz\Shared\Rules\IntegerAndPositiveRule;
use Franz\Shared\ValidationRule;

class TankCapacity extends ValidationRule
{


    public function __construct($value)
    {
        $this->rules = [new DecimalAndPositiveRule()];
        parent::__construct($value);
    }
}

<?php

namespace Franz\Airplanes\ValueObjects;

use Franz\Shared\Rules\IntegerAndPositiveRule;
use Franz\Shared\ValidationRule;

class LoadCapacity extends ValidationRule
{


    public function __construct($value)
    {
        $this->rules = [new IntegerAndPositiveRule()];
        parent::__construct($value);
    }
}

<?php

namespace Franz\Shared\Rules;

use Franz\Shared\IValidationRule;

class DecimalAndPositiveRule implements IValidationRule
{

    public static function isValid($value): bool
    {
        return is_numeric($value) && $value > 0;
    }

    public static function getMessage(): string
    {
        return "Value must be integer and positive";
    }
}

<?php

namespace Franz\Shared\Rules;

use Franz\Shared\IValidationRule;

class IntegerAndPositiveRule implements IValidationRule
{

    public static function isValid($value): bool
    {
        return is_int($value) && $value > 0;
    }

    public static function getMessage(): string
    {
        return "Value must be integer and positive";
    }
}

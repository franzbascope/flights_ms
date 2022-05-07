<?php

namespace Franz\Shared\Rules;

use Franz\Shared\IValidationRule;

class NotEmpty implements IValidationRule
{

    public static function isValid($value): bool
    {
       return !$value;
    }

    public static function getMessage(): string
    {
        return "Value cannot be falsy";
    }
}

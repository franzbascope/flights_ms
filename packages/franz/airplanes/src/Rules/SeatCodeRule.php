<?php

namespace Franz\Airplanes\Rules;

class SeatCodeRule implements \Franz\Shared\IValidationRule
{

    public static function isValid($value): bool
    {
        return strlen($value) === 3;
    }

    public static function getMessage(): string
    {
        return "Seat code must be 3 characters";
    }
}

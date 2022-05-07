<?php

namespace Franz\Airplanes\Rules;

class SeatClassRule implements \Franz\Shared\IValidationRule
{
    private static array $possibleValues = ["first_class","poor","economic"];
    public static function isValid($value): bool
{

    return in_array($value,self::$possibleValues);
}

    public static function getMessage(): string
{
    return "Seat class must be one of these values: ".implode(",",self::$possibleValues);
}
}

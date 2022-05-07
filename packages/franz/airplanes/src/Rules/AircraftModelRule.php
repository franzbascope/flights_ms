<?php

namespace Franz\Airplanes\Rules;

class AircraftModelRule implements \Franz\Shared\IValidationRule
{
    private static $possibleModels = ["tesla","bca"];
    public static function isValid($value): bool
    {
        return in_array($value,self::$possibleModels);
    }

    public static function getMessage(): string
    {
        return "Aircraft model must be one of these values: ".implode(",",self::$possibleModels);
    }
}

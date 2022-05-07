<?php

namespace Franz\Airplanes\Rules;

class AircraftBrandRule implements \Franz\Shared\IValidationRule
{
    private static $possibleBrands = ["toyota","merdedez"];
    public static function isValid($value): bool
    {

        return in_array($value,self::$possibleBrands);
    }

    public static function getMessage(): string
    {
        return "Aircraft brand must be one of these values: ".implode(",",self::$possibleBrands);
    }
}

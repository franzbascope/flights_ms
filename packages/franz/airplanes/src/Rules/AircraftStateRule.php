<?php

namespace Franz\Airplanes\Rules;

class AircraftStateRule implements \Franz\Shared\IValidationRule
{
    private static $possibleStates = ["ready","not_ready"];
    public static function isValid($value): bool
    {

        return in_array($value,self::$possibleStates);
    }

    public static function getMessage(): string
    {
        return "Aircraft state must be one of these values: ".implode(",",self::$possibleStates);
    }
}

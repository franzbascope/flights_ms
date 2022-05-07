<?php

namespace Franz\Shared;

interface IValidationRule
{
    public static function isValid($value) : bool;
    public static function getMessage() : string;

}

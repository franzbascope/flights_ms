<?php

namespace Franz\Fligths\Factory;

use Franz\Fligths\Models\FlightProgram;

class FlightProgramFactory
{
    public static function create(array $data)
    {
        return new FlightProgram($data["source_code"], $data["destiny_code"]);
    }

}

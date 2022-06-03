<?php

namespace Franz\Fligths\Factory;

use Franz\Fligths\Models\FlightProgram;
use Illuminate\Support\Facades\App;

class FlightProgramFactory
{
    public static function create(array $data)
    {
        return App::make(FlightProgram::class, $data);
    }

}

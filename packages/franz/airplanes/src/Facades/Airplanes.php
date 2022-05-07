<?php

namespace Franz\Airplanes\Facades;

use Illuminate\Support\Facades\Facade;

class Airplanes extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'airplanes';
    }
}

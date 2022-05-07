<?php

namespace Franz\Airports\Facades;

use Illuminate\Support\Facades\Facade;

class Airports extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'airports';
    }
}

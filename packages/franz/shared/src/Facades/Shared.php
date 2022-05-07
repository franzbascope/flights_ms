<?php

namespace Franz\Shared\Facades;

use Illuminate\Support\Facades\Facade;

class Shared extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'shared';
    }
}

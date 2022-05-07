<?php

namespace Franz\Fligths\Facades;

use Illuminate\Support\Facades\Facade;

class Fligths extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'fligths';
    }
}

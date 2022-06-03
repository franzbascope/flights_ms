<?php

namespace Tests\Unit\flights\CQRS\Handlers;

use Franz\Fligths\CQRS\Commands\AddFlightCommand;
use Franz\Fligths\CQRS\Handlers\AddFlightHandler;
use Tests\TestCase;

class AddFlightHandlerTest extends TestCase
{
    public function testPlaceOrder()
    {
        $this->expectException(\Exception::class);
        $flightHandler = new AddFlightHandler();
        $flightHandler->placeOrder((new  AddFlightCommand("test", "test", [])));

    }

}

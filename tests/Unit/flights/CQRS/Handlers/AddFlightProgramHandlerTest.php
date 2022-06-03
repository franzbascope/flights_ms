<?php

namespace Tests\Unit\flights\CQRS\Handlers;

use Franz\Fligths\CQRS\Commands\AddFlightProgramCommand;
use Franz\Fligths\CQRS\Handlers\AddFlightProgramHandler;
use Tests\TestCase;

class AddFlightProgramHandlerTest extends TestCase
{
    public function testPlaceOrder(){
        $this->expectException(\Exception::class);
        $handler = new AddFlightProgramHandler();
        $handler->placeOrder((new AddFlightProgramCommand("Test",[])));
    }

}

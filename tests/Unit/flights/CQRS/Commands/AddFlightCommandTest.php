<?php

namespace Tests\Unit\flights\CQRS\Commands;

use Franz\Fligths\CQRS\Commands\AddFlightCommand;
use Tests\TestCase;

class AddFlightCommandTest extends TestCase
{
    public function testAssignProperties(){
        $itinerary_uuid = "test";
        $flight_program_uuid = "test";
        $flight = ["uuid"=>"flight"];
        $addFlightCommand = new AddFlightCommand($itinerary_uuid,$flight_program_uuid,$flight);
        $this->assertEquals($itinerary_uuid,$addFlightCommand->getItineraryUuid());
        $this->assertEquals($flight_program_uuid,$addFlightCommand->getFlightProgramUuid());
        $this->assertEquals($flight,$addFlightCommand->getData());
    }

}

<?php

namespace Tests\Unit\flights\CQRS\Commands;

use Franz\Fligths\CQRS\Commands\AddFlightProgramCommand;
use Tests\TestCase;

class AddFlightProgramCommandTest extends TestCase
{
    public function testAssignProperties(){
        $itinerary_uuid = "test";
        $flight_program = ["test"=>"test"];
        $command = new AddFlightProgramCommand($itinerary_uuid,$flight_program);
        $this->assertEquals($itinerary_uuid,$command->getItineraryUuid());
        $this->assertEquals($flight_program,$command->getFlightProgram());
    }

}

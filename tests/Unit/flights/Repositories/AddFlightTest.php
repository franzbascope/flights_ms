<?php

namespace Tests\Unit\flights\Repositories;

use Franz\Fligths\Repositories\AddFlight;
use Franz\Fligths\Repositories\IItinieraryRepository;
use Tests\TestCase;

class AddFlightTest extends TestCase
{

    public function testaddFlight()
    {
        $mock = \Mockery::mock(IItinieraryRepository::class);
        $addFlight = new AddFlight($mock);
        $itinerary_uuid = "itinerary_123";
        $flight_program_uuid = "flight_program_123";
        $flight = ["code" => "test", "source_code" => "VVI", "destiny" => "SCC", "startDateTime" => new \DateTime(), "endDateTime" => new \DateTime(), "crew" => []];
        $fakeReturn = [
            "uuid" => $itinerary_uuid, "flight_programs" => [
                [
                    "source_code" => "VVI",
                    "uuid" => $flight_program_uuid
                ], [
                    "source_code" => "CBB",
                    "uuid" => "asd"
                ]
            ]
        ];
        $fakeUpdate = [
            "uuid" => $itinerary_uuid, "flight_programs" => [
                [
                    "uuid" => $flight_program_uuid,
                    "flight" => $flight
                ]
            ]
        ];
        $mock->shouldReceive('find')->once()->andReturn($fakeReturn);
        $mock->shouldReceive('update')->once()->andReturn($fakeUpdate);
        $result = $addFlight->addFlight($itinerary_uuid, $flight_program_uuid, $flight);
        $this->assertEquals($flight["crew"], $result["flight_programs"][0]["flight"]["crew"]);
    }

}

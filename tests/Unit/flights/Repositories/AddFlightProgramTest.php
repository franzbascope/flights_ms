<?php

namespace Tests\Unit\flights\Repositories;

use Franz\Fligths\Repositories\AddFlight;
use Franz\Fligths\Repositories\AddFlightProgram;
use Franz\Fligths\Repositories\IItinieraryRepository;
use Tests\TestCase;

class AddFlightProgramTest extends TestCase
{

    public function testAddFlightProgram()
    {
        $mock = \Mockery::mock(IItinieraryRepository::class);
        $addFlightProgram = new AddFlightProgram($mock);
        $itinerary_uuid = "itinerary_123";
        $flight_program = [
            "source_code" => "CBB",
            "destiny_code" => "TAJ"
        ];
        $fakeItineraries = [

            "uuid" => $itinerary_uuid,
            "flight_programs" => [
                [
                    "uuid"=>"test",
                    "source_code" => "VVI",
                    "destiny_code" => "CBB"
                ],
                [
                    "uuid"=>"test2",
                    "source_code" => "CBB",
                    "destiny_code" => "SUC"
                ],


            ]
        ];

        $fakeUpdate = [
            "uuid" => $itinerary_uuid,
            "flight_programs" => [
                "source_code" => "VVI",
                "destiny_code" => "CBB"
            ]
        ];
        $updatedFlightPrograms =  [
            [
                "uuid"=>"test",
                "source_code" => "VVI",
                "destiny_code" => "CBB"
            ],
            $flight_program,
            [
                "uuid"=>"test2",
                "source_code" => "CBB",
                "destiny_code" => "SUC"
            ],
        ];
        $mock->shouldReceive('find')->once()->andReturn($fakeItineraries);
        $mock->shouldReceive('setFlightPrograms')->once()->andReturn($updatedFlightPrograms);
        $result = $addFlightProgram->addFlightProgram($itinerary_uuid, $flight_program);
        $this->assertTrue(count($result) === 3);
    }

    public function testTwoSameFlights()
    {
        $mock = \Mockery::mock(IItinieraryRepository::class);
        $addFlightProgram = new AddFlightProgram($mock);
        $itinerary_uuid = "itinerary_123";
        $flight_program = [
            "source_code" => "CBB",
            "destiny_code" => "SUC"
        ];
        $fakeItineraries = [

            "uuid" => $itinerary_uuid,
            "flight_programs" => [
                [
                    "uuid"=>"test",
                    "source_code" => "VVI",
                    "destiny_code" => "CBB"
                ],
                [
                    "uuid"=>"test2",
                    "source_code" => "CBB",
                    "destiny_code" => "SUC"
                ],


            ]
        ];

        $fakeUpdate = [
            "uuid" => $itinerary_uuid,
            "flight_programs" => [
                "source_code" => "VVI",
                "destiny_code" => "CBB"
            ]
        ];
        $updatedFlightPrograms =  [
            [
                "uuid"=>"test",
                "source_code" => "VVI",
                "destiny_code" => "CBB"
            ],
            $flight_program,
            [
                "uuid"=>"test2",
                "source_code" => "CBB",
                "destiny_code" => "SUC"
            ],
        ];
        $this->expectExceptionMessage("Cannot have two same flights together");
        $mock->shouldReceive('find')->once()->andReturn($fakeItineraries);
        $addFlightProgram->addFlightProgram($itinerary_uuid, $flight_program);
    }

    public function testInvalidError()
    {
        $mock = \Mockery::mock(IItinieraryRepository::class);
        $addFlightProgram = new AddFlightProgram($mock);
        $itinerary_uuid = "itinerary_123";
        $flight_program = [
            "source_code" => "CBB",
            "destiny_code" => "SUC"
        ];
        $fakeItineraries = [

            "uuid" => $itinerary_uuid,
            "flight_programs" => [

            ]
        ];

        $fakeUpdate = [
            "uuid" => $itinerary_uuid,
            "flight_programs" => [
                "source_code" => "VVI",
                "destiny_code" => "CBB"
            ]
        ];
        $updatedFlightPrograms =  [
            [
                "uuid"=>"test",
                "source_code" => "VVI",
                "destiny_code" => "CBB"
            ],
            $flight_program,
            [
                "uuid"=>"test2",
                "source_code" => "CBB",
                "destiny_code" => "SUC"
            ],
        ];
        $this->expectExceptionMessage("Invalid Configuration");
        $mock->shouldReceive('find')->once()->andReturn($fakeItineraries);
        $addFlightProgram->addFlightProgram($itinerary_uuid, $flight_program);
    }

}

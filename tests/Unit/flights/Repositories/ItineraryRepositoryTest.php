<?php

namespace Tests\Unit\flights\Repositories;


use Franz\Fligths\Database\IDatabase;
use Franz\Fligths\Repositories\ItineraryRepository;
use Mockery;
use Tests\TestCase;

class ItineraryRepositoryTest extends TestCase
{


    public function testCreate()
    {
        $mock = Mockery::mock(IDatabase::class);
        $mock->shouldReceive('getItineraries')->once()->andReturn([]);
        $mock->shouldReceive('setItinieraries')->once()->andReturn([]);
        $repository = new ItineraryRepository($mock);
        $data = [
            "source_code" => "VVI",
            "destiny_code" => "SUC",
            "flight_programs" => [
                ["source_code" => "VVI",
                    "destiny_code" => "CBB"],
                [
                    "source_code" => "CBB",
                    "destiny_code" => "SUC"
                ]
            ]
        ];
        $result = $repository->create($data);
        $this->assertNotNull($result);
    }

    public function testGetItinieraries()
    {
        $mock = Mockery::mock(IDatabase::class);
        $mock->shouldReceive('getItineraries')->once()->andReturn([]);
        $repository = new ItineraryRepository($mock);
        $result = $repository->get([]);
        $this->assertEquals([], $result);

    }

    public function testFind()
    {
        $mock = Mockery::mock(IDatabase::class);
        $uuid = "test";
        $mockResult = [[
            "uuid" => $uuid
        ]];
        $mock->shouldReceive('getItineraries')->once()->andReturn($mockResult);
        $repository = new ItineraryRepository($mock);
        $result = $repository->find($uuid);
        $this->assertEquals($uuid, $result["uuid"]);
    }

    public function testSetFlightPrograms()
    {
        $uuid = "test";
        $flightProgram = ["test" => "test"];
        $mockResult = [[
            "uuid" => $uuid
        ], [
            "uuid" => "Test"
        ]
        ];
        $mock = Mockery::mock(IDatabase::class);
        $mock->shouldReceive('getItineraries')->twice()->andReturn($mockResult);
        $mock->shouldReceive('setItinieraries')->once()->andReturn($mockResult);
        $repository = new ItineraryRepository($mock);
        $result = $repository->setFlightPrograms($uuid, $flightProgram);
        $this->assertEquals($flightProgram, $result["flight_programs"]);

    }

    public function testUpdate(){
        $uuid = "test";
        $itinerary = ["uuid"=>$uuid,"test"=>"test"];
        $mockGetItineraries = [[
            "uuid" => $uuid
        ], [
            "uuid" => "Test"
        ]
        ];
        $mock = Mockery::mock(IDatabase::class);
        $mock->shouldReceive('getItineraries')->once()->andReturn($mockGetItineraries);
        $mock->shouldReceive('setItinieraries')->once();
        $repository = new ItineraryRepository($mock);
        $result = $repository->update($itinerary);
        $this->assertIsArray($result);
    }

}

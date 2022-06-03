<?php

namespace Tests\Unit\flights\Factory;


use Franz\Fligths\Airport\IAirportClient;
use Franz\Fligths\Factory\FlightFactory;
use Mockery\Mock;
use Tests\TestCase;

class FlightFactoryTest extends TestCase
{
    public function testCreateFlight()
    {
        $airportClientMock = \Mockery::mock(IAirportClient::class);
        $airportCode = "VVI";
        $airportClientMock->shouldReceive("getFlightCode")->with($airportCode)->andReturn("test");
        $airportClientMock->shouldReceive("getPlaneForFlight")->with("test")->andReturn([]);
        $data = [
            "startDateTime" => new \DateTime(),
            "endDateTime" => new \DateTime(),
            "crew" => [],
        ];
        $flightFactory = new FlightFactory($airportClientMock);
        $response = $flightFactory->createFlight($airportCode, $data);
        $this->assertNotNull($response);
    }

}

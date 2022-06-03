<?php

namespace Tests\Unit\flights\Models;

use Franz\Fligths\Airport\IAirportClient;
use Franz\Fligths\Models\FlightProgram;
use Tests\TestCase;

class FlightProgramTest extends TestCase
{
    public function testSerializeCorrectly(){
        $mockAirportClient = $this->createStub(IAirportClient::class);
        // Configure the stub.
        $mockAirportClient->method('getAirportByCityCode')
            ->willReturn('VVI');

        $source_code = "VVI";
        $destiny_code = "CBB";
        $flightProgram = (new FlightProgram($source_code,$destiny_code,$mockAirportClient))->serialize();
        $this->assertEquals($source_code,$flightProgram["source_code"]);
        $this->assertEquals($destiny_code,$flightProgram["destiny_code"]);
        $this->assertArrayHasKey("uuid",$flightProgram);
    }

}

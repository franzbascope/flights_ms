<?php

namespace Tests\Unit\flights\Models;

use Franz\Fligths\Airport\IAirportClient;
use Franz\Fligths\Models\FlightProgram;
use Franz\Fligths\Models\Itinerary;
use Tests\TestCase;

class ItineraryTest extends TestCase
{

    private IAirportClient $mockAirportClient;

    public function __construct()
    {
        parent::__construct();
        $this->mockAirportClient = $this->createStub(IAirportClient::class);
        // Configure the stub.
        $this->mockAirportClient->method('getAirportByCityCode')
            ->willReturn('VVI');
    }

    public function testSerializesCorrectly()
    {
        $flightPrograms = [(new FlightProgram("VVI", "CBB", $this->mockAirportClient))->serialize(), (new FlightProgram("CBB", "SUC", $this->mockAirportClient))->serialize()];

        $source = "VVI";
        $destiny = "SUC";
        $itinerary = (new Itinerary($source, $destiny, $flightPrograms))->serialize();
        $this->assertEquals($source, $itinerary["source_code"]);
        $this->assertEquals($destiny, $itinerary["destiny_code"]);
        $this->assertArrayHasKey("flight_programs", $itinerary);
    }

    public function testValidateHasFlightPrograms()
    {
        $this->expectExceptionMessage("Must have at least one flight profram");
        $source = "VVI";
        $destiny = "SUC";
        (new Itinerary($source, $destiny, []))->serialize();
    }

    public function testValidateSourceMatchesFlightProgram()
    {
        $this->expectExceptionMessage("Itinerary source must match with flight program");
        $flightPrograms = [(new FlightProgram("VVI", "CBB", $this->mockAirportClient))->serialize(), (new FlightProgram("CBB", "SUC", $this->mockAirportClient))->serialize()];
        $source = "CBB";
        $destiny = "SUC";
        (new Itinerary($source, $destiny, $flightPrograms))->serialize();
    }

    public function testDestinyMustMatchFlightProgram()
    {
        $this->expectExceptionMessage("Itinerary destiny must match with flight program");
        $flightPrograms = [(new FlightProgram("VVI", "CBB", $this->mockAirportClient))->serialize(), (new FlightProgram("CBB", "SUC", $this->mockAirportClient))->serialize()];
        $source = "VVI";
        $destiny = "TAJ";
        (new Itinerary($source, $destiny, $flightPrograms))->serialize();
    }

}

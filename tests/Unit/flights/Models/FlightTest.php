<?php

namespace Tests\Unit\flights\Models;

use DateTime;
use Franz\Fligths\Models\Flight;
use Tests\TestCase;

class FlightTest extends TestCase
{
    private $flight_number;
    private $start;
    private $end;
    private $crew;
    private $aircraft;

    /**
     * @param $flight_number
     * @param $start
     * @param $end
     * @param $crew
     * @param $aircraft
     */
    public function __construct()
    {
        parent::__construct();
        $flight_number = "test123";
        $start = new DateTime();
        $end = new DateTime();
        $crew = [
            "id" => "test",
            "captain" => "Captain DR",
            "members" => [
                [
                    "name" => "Franz"
                ]
            ]
        ];
        $seats = [
            ["class" => "poor", "code" => "abc"]
            , ["class" => "poor", "code" => "bca"]
        ];
        $aircraft = [
            "brand" => "toyota",
            "model" => "tesla",
            "state" => "ready",
            "loadCapacity" => 1000,
            "tankCapacity" => 1000,
            "seatNumber" => 20,
            "parkingAirport" => "12312312312",
            "seats" => $seats

        ];
        $this->flight_number = $flight_number;
        $this->start = $start;
        $this->end = $end;
        $this->crew = $crew;
        $this->aircraft = $aircraft;
    }


    public function testAssignProperties()
    {
        $flight = new Flight($this->flight_number, $this->start, $this->end, $this->crew, $this->aircraft);
        $this->assertEquals($this->flight_number, $flight->flight_number);
        $this->assertEquals($this->start, $flight->startDateTime);
        $this->assertEquals($this->end, $flight->endDateTime);
        $this->assertEquals($this->crew, $flight->crew);
        $this->assertEquals($this->aircraft, $flight->airplane);

    }

    public function testSerialize()
    {
        $flight = (new Flight($this->flight_number, $this->start, $this->end, $this->crew, $this->aircraft))->serialize();
        $this->assertEquals($this->flight_number, $flight["flight_number"]);
        $this->assertEquals($this->start->format("Y-m-d H:i"), $flight["startDateTime"]);
        $this->assertEquals($this->end->format("Y-m-d H:i"), $flight["endDateTime"]);
        $this->assertEquals($this->crew, $flight["crew"]);
        $this->assertEquals($this->aircraft, $flight["airplane"]);
    }

}

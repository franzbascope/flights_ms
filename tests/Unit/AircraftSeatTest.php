<?php

namespace Tests\Unit;

use Franz\Airplanes\Factory\AircraftSeatFactory;
use PHPUnit\Framework\TestCase;

class AircraftSeatTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSerializingCorrectly()
    {
        $data = ["class" => "first_class","code" => "ABC"];
        $seat = AircraftSeatFactory::createAircraftSeat($data)->toArray();

        $this->assertEquals("first_class",$seat["class"]);
        $this->assertEquals("ABC",$seat["code"]);
        $this->assertArrayHasKey("uuid",$seat);
    }

    public function testValidatesSeatClass(){
        $this->expectExceptionMessage("Seat class must be one of these values: first_class,poor,economic");
        $data = ["class" => "first_classa","code" => "ABC"];
        AircraftSeatFactory::createAircraftSeat($data)->toArray();
    }

    public function testValidationSeatCode(){
        $this->expectExceptionMessage("Seat code must be 3 characters");
        $data = ["class" => "first_class","code" => "ABC1"];
        AircraftSeatFactory::createAircraftSeat($data)->toArray();
    }
}

<?php

namespace Tests\Unit;

use Franz\Airports\Factories\AirportFactory;
use PHPUnit\Framework\TestCase;

class AirportTest extends TestCase
{
    public function testHasCorrectProperties(){
        $airport = AirportFactory::createAirport(["cityCode" => "VVI","code" =>"12345","name"=>"ViruViru"])->serialize();
        $this->assertEquals("ViruViru",$airport["name"]);
        $this->assertEquals("VVI",$airport["cityCode"]);
        $this->assertEquals("VVI",$airport["cityCode"]);
        $this->assertArrayHasKey("uuid",$airport);
    }

    public function testAirportValidationCityCode(){
        $this->expectException(\Exception::class);
        $airport = AirportFactory::createAirport(["cityCode" => "VVIa","code" =>"12345","name"=>"ViruViru"])->serialize();
    }

    public function testAirportValidationCode(){
        $this->expectException(\Exception::class);
        $airport = AirportFactory::createAirport(["cityCode" => "VVI","code" =>"123456","name"=>"ViruViru"])->serialize();
    }

    public function testAirportValidationName(){
        $this->expectException(\Exception::class);
        $airport = AirportFactory::createAirport(["cityCode" => "VVI","code" =>"123456","name"=>""])->serialize();
    }


}

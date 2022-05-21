<?php

namespace Tests\Unit;

use Franz\Airports\Http\Controllers\AirportController;
use Franz\Airports\Repositories\IAirportRepository;
use Illuminate\Http\Request;
use Mockery;
use PHPUnit\Framework\TestCase;

class AiportControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSaveAirport()
    {
        $mock = Mockery::mock(IAirportRepository::class);
        $airportController = new AirportController($mock);
        $mock->shouldReceive('get')->with()->once()->andReturn([]);
        $request = new Request();
        $response = $airportController->index($request);
        $this->assertEquals([],$response);
    }
}

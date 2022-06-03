<?php

namespace Tests\Unit\flights\Controllers;

use Franz\Airports\Http\Controllers\AirportController;
use Franz\Fligths\CQRS\Commands\AddFlightProgramCommand;
use Franz\Fligths\Http\Controllers\ItineraryController;
use Franz\Fligths\Repositories\IItinieraryRepository;
use Illuminate\Http\Request;
use Ecotone\Modelling\CommandBus;
use Mockery\Mock;
use Tests\TestCase;

class ItineraryControllerTest extends TestCase
{

    public function testIndex(){
        $repository =  \Mockery::mock(IItinieraryRepository::class);
        $commandBus = $this->createStub(CommandBus::class);
        $repository->shouldReceive("get")->once()->andReturn([]);
        $controller = new ItineraryController($repository,$commandBus);
        $response =  $controller->index(new Request());
        $this->assertEquals([],$response);
    }

    public function testEdit(){
        $repository =  \Mockery::mock(IItinieraryRepository::class);
        $commandBus = $this->createStub(CommandBus::class);
        $repository->shouldReceive("find")->once()->with("test")->andReturn([]);
        $controller = new ItineraryController($repository,$commandBus);
        $response =  $controller->edit("test");
        $this->assertEquals([],$response);
    }

    public function testCreate(){
        $repository =  \Mockery::mock(IItinieraryRepository::class);
        $commandBus = $this->createStub(CommandBus::class);
        $repository->shouldReceive("create")->once()->with([])->andReturn([]);
        $controller = new ItineraryController($repository,$commandBus);
        $response =  $controller->create(new Request());
        $this->assertEquals([],$response);
    }

    public function testAddFlightProgram(){
        $itineraryRepositoryMock =  \Mockery::mock(IItinieraryRepository::class);
        $commandBusMock =  \Mockery::mock(CommandBus::class);
        $commandBusMock->shouldReceive("send")->once()->andReturn([]);
        $airportController = new ItineraryController($itineraryRepositoryMock,$commandBusMock);
        $request = \Mockery::mock(Request::class);
        $request->shouldReceive("get")->once()->andReturn([]);
        $response = $airportController->addFlightProgram("",$request);
        $this->assertEquals($response,[]);
    }

    public function testAddFlight(){
        $itineraryRepositoryMock =  \Mockery::mock(IItinieraryRepository::class);
        $commandBusMock =  \Mockery::mock(CommandBus::class);
        $commandBusMock->shouldReceive("send")->once()->andReturn([]);
        $airportController = new ItineraryController($itineraryRepositoryMock,$commandBusMock);
        $request = \Mockery::mock(Request::class);
        $request->shouldReceive("get")->with("flight")->once()->andReturn([]);
        $response = $airportController->addFlight("","",$request);
        $this->assertEquals($response,[]);
    }

}

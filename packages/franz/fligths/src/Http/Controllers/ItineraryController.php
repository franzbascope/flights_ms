<?php

namespace Franz\Fligths\Http\Controllers;

use Franz\Fligths\CQRS\Commands\AddFlightCommand;
use Franz\Fligths\CQRS\Commands\AddFlightProgramCommand;
use Franz\Fligths\Repositories\IItinieraryRepository;
use Illuminate\Http\Request;
use Ecotone\Modelling\CommandBus;

class ItineraryController
{
    public IItinieraryRepository $itinieraryRepository;

    /**
     * @param IItinieraryRepository $itinieraryRepository
     */
    public function __construct(IItinieraryRepository $itinieraryRepository,private CommandBus $commandBus)
    {
        $this->itinieraryRepository = $itinieraryRepository;
    }

    public function index(Request $request){
        return $this->itinieraryRepository->get($request->all());
    }

    public function edit(string $uuid){
        return $this->itinieraryRepository->find($uuid);
    }

    public function create(Request $request){
        return $this->itinieraryRepository->create($request->all());
    }

    public function addFlightProgram(string $itinerary_uuid, Request $request){
        $data = $request->all()["flight_program"];
        $command = new AddFlightProgramCommand($itinerary_uuid,$data);
        return $this->commandBus->send($command);
    }

    public function addFlight(string $itinerary_uuid,string $program_uuid, Request $request){
        $data = $request->get("flight");
        $command = new AddFlightCommand($itinerary_uuid,$program_uuid, $data);
        return $this->commandBus->send($command);
    }


}

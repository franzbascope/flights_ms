<?php

namespace Franz\Fligths\Repositories;

use Franz\Fligths\Factory\FlightFactory;
use Illuminate\Support\Facades\App;

class AddFlight implements IAddFlight
{
    private IItinieraryRepository $itineraryRepository;

    /**
     * @param IItinieraryRepository $itineraryRepository
     */
    public function __construct(IItinieraryRepository $itineraryRepository)
    {
        $this->itineraryRepository = $itineraryRepository;
    }


    public function addFlight(string $itinerary_uuid,string $flight_program_uuid, array $data)
    {
        // find itinerary to change
        $itinerary = $this->itineraryRepository->find($itinerary_uuid);
        // find program to update
        $flight_program = collect($itinerary["flight_programs"])->firstOrFail(function($program) use($flight_program_uuid){
            return $flight_program_uuid === $program["uuid"];
        });
        // create flight and update program
        $factory = App::make(FlightFactory::class);
        $flight = $factory->createFlight($flight_program["source_code"],$data)->serialize();
        $flight_program["flight"] = $flight;

        // update flight programs
        $itinerary["flight_programs"] = collect($itinerary["flight_programs"])->map(function ($item) use($flight_program){
            if($item["uuid"] === $flight_program["uuid"] )
                return $flight_program;
            return $item;
        })->toArray();
        //update itinerary
        $this->itineraryRepository->update($itinerary);
        return $itinerary;
    }
}

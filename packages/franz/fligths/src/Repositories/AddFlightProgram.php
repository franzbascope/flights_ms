<?php

namespace Franz\Fligths\Repositories;

use Franz\Fligths\Factory\FlightProgramFactory;

class AddFlightProgram implements IAddFlightProgram
{

    private IItinieraryRepository $itinieraryRepository;

    /**
     * @param IItinieraryRepository $itinieraryRepository
     */
    public function __construct(IItinieraryRepository $itinieraryRepository)
    {
        $this->itinieraryRepository = $itinieraryRepository;
    }


    public function addFlightProgram(string $itinerary_uuid, array $data): array
    {
        // TODO: Move to a rule
        $flight_program = FlightProgramFactory::create($data)->serialize();
        $itinerary = $this->itinieraryRepository->find($itinerary_uuid);
        $flight_programs = $itinerary["flight_programs"];
        for ($i = 0; $i < count($flight_programs) - 1; $i++) {
            $current_program = $flight_programs[$i];
            $next_program = $flight_programs[$i + 1];
            if ($flight_program["source_code"] === $current_program["destiny_code"]) {
                if($next_program["source_code"] === $flight_program["source_code"]
                 && $next_program["destiny_code"] === $flight_program["destiny_code"])
                    throw new \Exception("Cannot have two same flights together");
                array_splice( $flight_programs, $i+1, 0, [$flight_program] );
                $next_program["source_code"] = $flight_program["destiny_code"];
                array_splice( $flight_programs, $i+2, 1, [$next_program] );
                $response = $this->itinieraryRepository->setFlightPrograms($itinerary_uuid,$flight_programs);
                return $response;
            }
        }
        throw new \Exception("Invalid Configuration");
    }
}

<?php

namespace Franz\Fligths\CQRS\Commands;

class AddFlightProgramCommand
{
    private string $itinerary_uuid;
    private array $flight_program;

    /**
     * @param string $itinerary_uuid
     * @param array $flight_program
     */
    public function __construct(string $itinerary_uuid, array $flight_program)
    {
        $this->itinerary_uuid = $itinerary_uuid;
        $this->flight_program = $flight_program;
    }

    /**
     * @return string
     */
    public function getItineraryUuid(): string
    {
        return $this->itinerary_uuid;
    }

    /**
     * @return array
     */
    public function getFlightProgram(): array
    {
        return $this->flight_program;
    }




}

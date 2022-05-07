<?php

namespace Franz\Fligths\CQRS\Commands;

class AddFlightCommand
{
    private string $itinerary_uuid;
    private string $flight_program_uuid;
    private array $data;

    /**
     * @param string $itinerary_uuid
     * @param string $flight_program_uuid
     * @param array $data
     */
    public function __construct(string $itinerary_uuid, string $flight_program_uuid, array $data)
    {
        $this->itinerary_uuid = $itinerary_uuid;
        $this->flight_program_uuid = $flight_program_uuid;
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getItineraryUuid(): string
    {
        return $this->itinerary_uuid;
    }

    /**
     * @return string
     */
    public function getFlightProgramUuid(): string
    {
        return $this->flight_program_uuid;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }




}

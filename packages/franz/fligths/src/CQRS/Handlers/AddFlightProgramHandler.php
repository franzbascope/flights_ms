<?php

namespace Franz\Fligths\CQRS\Handlers;

use Ecotone\Modelling\Attribute\CommandHandler;
use Franz\Fligths\CQRS\Commands\AddFlightProgramCommand;
use Franz\Fligths\Repositories\AddFlightProgram;
use Franz\Fligths\Repositories\IAddFlightProgram;
use Franz\Fligths\Repositories\ItineraryRepository;
use Illuminate\Support\Facades\App;

class AddFlightProgramHandler
{

    private IAddFlightProgram $addFlightProgram;

    /**
     * @param IAddFlightProgram $addFlightProgram
     */
    public function __construct()
    {
        $this->addFlightProgram = new AddFlightProgram((new ItineraryRepository()));
    }


    #[CommandHandler]
    public function placeOrder(AddFlightProgramCommand $command) : array
    {
        return $this->addFlightProgram->addFlightProgram($command->getItineraryUuid(),$command->getFlightProgram());
    }

}

<?php

namespace Franz\Fligths\CQRS\Handlers;

use Ecotone\Modelling\Attribute\CommandHandler;
use Franz\Fligths\CQRS\Commands\AddFlightCommand;
use Franz\Fligths\Repositories\AddFlight;
use Franz\Fligths\Repositories\IAddFlight;
use Franz\Fligths\Repositories\ItineraryRepository;
use Illuminate\Support\Facades\App;


class AddFlightHandler
{

    private IAddFlight $addFlight;

    public function __construct()
    {
        $this->addFlight = new AddFlight((new ItineraryRepository()));
    }


    #[CommandHandler]
    public function placeOrder(AddFlightCommand $command): array
    {
        return $this->addFlight->addFlight($command->getItineraryUuid(), $command->getFlightProgramUuid(), $command->getData());
    }

}

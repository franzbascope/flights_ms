<?php

namespace Franz\Fligths\Database;

use Franz\Fligths\Repositories\IItinieraryRepository;

class ItinerarySeeds
{
    private IItinieraryRepository $itinieraryRepository;

    /**
     * @param IItinieraryRepository $itinieraryRepository
     */
    public function __construct(IItinieraryRepository $itinieraryRepository)
    {
        $this->itinieraryRepository = $itinieraryRepository;
    }


    public function runSeeds()
    {
        $data = [
            "source_code" => "VVI",
            "destiny_code" => "SUC",
            "flight_programs" => [
                ["source_code" => "VVI",
                    "destiny_code" => "CBB"],
                [
                    "source_code" => "CBB",
                    "destiny_code" => "SUC"
                ]
            ]
        ];
        $this->itinieraryRepository->create($data);
    }

}

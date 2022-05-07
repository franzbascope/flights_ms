<?php

namespace Franz\Airplanes\Models;

use Franz\Airplanes\ValueObjects\SeatCode;
use Franz\Airplanes\ValueObjects\SeatClass;
use Franz\Shared\Entity;

class AircraftSeat extends Entity
{
    public SeatClass $class;
    public SeatCode $code;

    /**
     * @param SeatClass $class
     * @param SeatCode $code
     */
    public function __construct(SeatClass $class, SeatCode $code)
    {
        parent::__construct();
        $this->class = $class;
        $this->code = $code;
    }

    public function toArray()
    {
        return [
            "class" => $this->class->getValue(),
            "code" => $this->class->getValue(),
            "uuid" => $this->getUuid()

        ];
    }


}

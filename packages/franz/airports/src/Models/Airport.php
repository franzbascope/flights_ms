<?php

namespace Franz\Airports\Models;

use Franz\Airports\Dto\AirportDto;

use Franz\Airports\ValueObjects\AiportCityCode;
use Franz\Airports\ValueObjects\AirportCode;
use Franz\Airports\ValueObjects\AirportName;
use Franz\Shared\Entity;

class Airport extends Entity
{
    private AiportCityCode $cityCode;
    private AirportCode $code;
    private AirportName $name;

    /**
     * @param AiportCityCode $cityCode
     * @param AirportCode $code
     * @param AirportName $name
     */
    public function __construct(AiportCityCode $cityCode, AirportCode $code, AirportName $name)
    {
        parent::__construct();
        $this->cityCode = $cityCode;
        $this->code = $code;
        $this->name = $name;
    }

    public function serialize()
    {
        return [
            "uuid" => $this->getUuid(),
            "cityCode" => $this->cityCode->getValue(),
            "code" => $this->code->getValue(),
            "name" => $this->name->getValue(),
        ];
    }


}

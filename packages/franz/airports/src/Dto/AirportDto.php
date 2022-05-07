<?php

namespace Franz\Airports\Dto;

class AirportDto
{
    public string $code;
    public string $cityCode;
    public string $name;
    public string $uuid;

    /**
     * @param string $code
     * @param string $cityCode
     * @param string $name
     * @param string $uuid
     */
    public function __construct(string $code, string $cityCode, string $name, string $uuid)
    {
        $this->code = $code;
        $this->cityCode = $cityCode;
        $this->name = $name;
        $this->uuid = $uuid;
    }


}

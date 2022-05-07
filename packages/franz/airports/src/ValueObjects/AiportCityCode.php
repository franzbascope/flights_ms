<?php

namespace Franz\Airports\ValueObjects;

class AiportCityCode
{
    private string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        if(strlen($value) != 3){
            throw new \Exception("Airport city code must be 3 digits");
        }
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }


}

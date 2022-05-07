<?php

namespace Franz\Airports\ValueObjects;

class AirportCode
{
    private string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        if(strlen($value) != 5 ){
            throw new \Exception("Airport code must be 5 digits");
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

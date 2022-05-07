<?php

namespace Franz\Airports\ValueObjects;

class AirportName
{
    private string $value;

    /**
     * @param $value
     */
    public function __construct(string $value)
    {
        if($value === "")
            throw new \Exception("Aiport Name must not be empty");
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }




}

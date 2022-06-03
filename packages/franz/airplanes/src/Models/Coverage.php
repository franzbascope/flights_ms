<?php

namespace Franz\Airplanes\Models;

class Coverage
{
    public string $test = "";

    /**
     * @param string $test
     */
    public function __construct(string $test)
    {
        $this->test = $test;
    }


}

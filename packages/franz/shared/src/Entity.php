<?php

namespace Franz\Shared;

class Entity
{
    private string $uuid;

    public function __construct()
    {
        $this->uuid = uniqid();
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }




}

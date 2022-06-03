<?php

namespace Franz\Fligths\Database;

interface IDatabase
{
    public function setItinieraries($itineraries);

    public function getItineraries($data = []);

}

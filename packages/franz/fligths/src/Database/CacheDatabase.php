<?php

namespace Franz\Fligths\Database;

use Illuminate\Support\Facades\Cache;

class CacheDatabase implements IDatabase
{

    private function getData(){
        return  Cache::get("fligths_ms") ?? [];
    }

    public function setItinieraries($itineraries){
        $fligths_ms = $this->getData();
        $fligths_ms["itineraries"]=$itineraries;
        Cache::put("fligths_ms",$fligths_ms);
    }

    public function getItineraries($data = []){
        $flights_ms = Cache::get("fligths_ms");
        return $flights_ms["itineraries"];
    }

}

<?php

namespace Franz\Airplanes\Database;

use Illuminate\Support\Facades\Cache;

class CacheDatabase
{
    private function getData(){
        return  Cache::get("fligths_ms");
    }

    public function saveAircrafts($aircrafts){
        $fligths_ms = $this->getData();
        $fligths_ms["aircrafts"]=$aircrafts;
        Cache::put("fligths_ms",$fligths_ms);
    }

    public function getAircrafts(){
        $flights_ms = Cache::get("fligths_ms");
        return $flights_ms["aircrafts"];
    }

}

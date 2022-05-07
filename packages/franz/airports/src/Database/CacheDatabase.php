<?php

namespace Franz\Airports\Database;

use Illuminate\Support\Facades\Cache;

class CacheDatabase
{

    private static $instance = null;

    private function __construct()
    {

    }

    private function getData(){
        return  Cache::get("fligths_ms");
    }

    public function saveAirports($airports){
        $fligths_ms = $this->getData();
        $fligths_ms["airports"]=$airports;
        Cache::put("fligths_ms",$fligths_ms);
    }

    public function getAirports(){
        $flights_ms = Cache::get("fligths_ms");
        return $flights_ms["airports"];
    }

    public static function initialize(){
        if(self::$instance == null){
            self::$instance = new CacheDatabase();
        }
        return self::$instance;
    }
}

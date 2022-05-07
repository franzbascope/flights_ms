<?php

namespace Franz\Fligths\Airport;

use Illuminate\Support\Facades\Http;

class AirportClient
{

    private string $base_url;

    public function __construct()
    {
        $this->base_url = config("fligths")["airport_base_url"];
    }

    public function getAirportByCityCode(string $code){
        $endpoint = $this->base_url."/airports/cityCode/$code";
        $response =  Http::get($endpoint);
        if(!$response->successful()){
            $response->throw();
        }
        return $response->json();
    }

    public function getFlightCode(string $code){
        $endpoint = $this->base_url."/airports/generate_flight_code/$code";
        $response =  Http::get($endpoint);
        if(!$response->successful()){
            $response->throw();
        }
        return $response->json()["flight_code"];
    }

    public function getPlaneForFlight(string $flight_code){
        $endpoint = $this->base_url."/aircrafts";
        $response =  Http::get($endpoint);
        if(!$response->successful()){
            $response->throw();
        }
        $data =  $response->json();
        return $data[0];
    }

}

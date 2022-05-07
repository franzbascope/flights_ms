<?php

namespace Franz\Airplanes\Http\Controllers;


use Franz\Airplanes\Repository\IAircraftRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AircraftController
{
    private IAircraftRepository $repository;

    /**
     * @param IAircraftRepository $repository
     */
    public function __construct(IAircraftRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request){
        return $this->repository->get($request->all());
    }

    public function edit($uuid){
        return $this->repository->edit($uuid);
    }


}

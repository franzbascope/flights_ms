<?php

namespace Franz\Airplanes\Repository;

interface IAircraftRepository
{
    public function create($data = []): array;
    public function get($filters = []): array;
    public function edit($uuid): array;

}

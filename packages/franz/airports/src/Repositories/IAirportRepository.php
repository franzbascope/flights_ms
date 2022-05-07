<?php

namespace Franz\Airports\Repositories;

use Franz\Airports\Dto\AirportDto;
use Franz\Airports\Factories\AirportFactory;

interface IAirportRepository
{
    public function create(array $data): array;

    public function get($filters = []): array;

    public function edit(string $uuid): array;

    public function findByCityCode(string $code): array;


}

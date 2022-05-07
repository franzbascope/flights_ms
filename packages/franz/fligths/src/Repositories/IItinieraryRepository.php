<?php

namespace Franz\Fligths\Repositories;

interface IItinieraryRepository
{
    public function create(array $data): array;
    public function get(array $filters): array;
    public function find(string $uuid): array;
    public function update(array $data): array;
    public function setFlightPrograms(string $uuid,array $flight_programs): array;

}

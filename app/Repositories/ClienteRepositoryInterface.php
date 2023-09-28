<?php

namespace App\Repositories;

interface ClienteRepositoryInterface
{
    public function getAll(string $filter = ''): array;
}

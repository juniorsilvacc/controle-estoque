<?php

namespace App\Repositories;

interface ClienteRepositoryInterface
{
    public function getAll();

    public function create(array $data);
}

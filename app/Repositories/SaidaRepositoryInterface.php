<?php

namespace App\Repositories;

interface SaidaRepositoryInterface
{
    public function findById(string $id);

    public function create(array $data);

    public function getAll();
}

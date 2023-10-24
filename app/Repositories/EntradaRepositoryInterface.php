<?php

namespace App\Repositories;

interface EntradaRepositoryInterface
{
    public function findById(string $id);

    public function create(array $data);

    public function getAll();
}

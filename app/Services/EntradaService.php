<?php

namespace App\Services;

use App\Repositories\EntradaRepositoryInterface;

class EntradaService
{
    private $repository;

    public function __construct(
        EntradaRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function findById(string $id)
    {
        $entrada = $this->repository->findById($id);

        return $entrada;
    }

    public function create(array $data)
    {
        $entrada = $this->repository->create($data);

        return $entrada;
    }

    public function getAll(string $search = null)
    {
        $entradas = $this->repository->getAll($search);

        return $entradas;
    }
}

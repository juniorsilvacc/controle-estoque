<?php

namespace App\Services;

use App\Repositories\SaidaRepositoryInterface;

class SaidaService
{
    private $repository;

    public function __construct(
        SaidaRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function findById(string $id)
    {
        $saida = $this->repository->findById($id);

        return $saida;
    }

    public function create(array $data)
    {
        $saida = $this->repository->create($data);

        return $saida;
    }

    public function getAll(string $search = null)
    {
        $saida = $this->repository->getAll($search);

        return $saida;
    }
}

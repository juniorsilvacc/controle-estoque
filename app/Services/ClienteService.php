<?php

namespace App\Services;

use App\Repositories\ClienteRepositoryInterface;

class ClienteService
{
    private $repository;

    public function __construct(
        ClienteRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function getAll(string $search = null)
    {
        $clientes = $this->repository->getAll($search);

        return $clientes;
    }
}

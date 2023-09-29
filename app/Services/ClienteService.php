<?php

namespace App\Services;

use App\DTO\CreateClienteDTO;
use App\DTO\UpdateClienteDTO;
use App\Repositories\ClienteRepositoryInterface;

class ClienteService
{
    private $repository;

    public function __construct(
        ClienteRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function findByName(string $nome)
    {
        $cliente = $this->repository->findByName($nome);

        return $cliente;
    }

    public function findByEmail(string $email)
    {
        $cliente = $this->repository->findByEmail($email);

        return $cliente;
    }

    public function findById(string $id)
    {
        $cliente = $this->repository->findById($id);

        return $cliente;
    }

    public function getAll(string $search = null)
    {
        $clientes = $this->repository->getAll($search);

        return $clientes;
    }

    public function create(CreateClienteDTO $dto)
    {
        $cliente = $this->repository->create($dto);

        return $cliente;
    }

    public function update(UpdateClienteDTO $dto)
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id)
    {
        $this->repository->delete($id);
    }
}

<?php

namespace App\Services;

use App\DTO\CreateFornecedorDTO;
use App\DTO\UpdateFornecedorDTO;
use App\Repositories\FornecedorRepositoryInterface;

class FornecedorService
{
    private $repository;

    public function __construct(
        FornecedorRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function findByName(string $nome)
    {
        $fornecedor = $this->repository->findByName($nome);

        return $fornecedor;
    }

    public function findById(string $id)
    {
        $fornecedor = $this->repository->findById($id);

        return $fornecedor;
    }

    public function getAll(string $search = null)
    {
        $fornecedores = $this->repository->getAll($search);

        return $fornecedores;
    }

    public function create(CreateFornecedorDTO $dto)
    {
        $fornecedor = $this->repository->create($dto);

        return $fornecedor;
    }

    public function update(UpdateFornecedorDTO $dto)
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id)
    {
        $this->repository->delete($id);
    }
}

<?php

namespace App\Services;

use App\DTO\CreateCategoriaDTO;
use App\DTO\UpdateCategoriaDTO;
use App\Repositories\CategoriaRepositoryInterface;

class CategoriaService
{
    private $repository;

    public function __construct(
        CategoriaRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function findByName(string $nome)
    {
        $categoria = $this->repository->findByName($nome);

        return $categoria;
    }

    public function findById(string $id)
    {
        $categoria = $this->repository->findById($id);

        return $categoria;
    }

    public function getAll(string $search = null)
    {
        $categorias = $this->repository->getAll($search);

        return $categorias;
    }

    public function create(CreateCategoriaDTO $dto)
    {
        $categoria = $this->repository->create($dto);

        return $categoria;
    }

    public function update(UpdateCategoriaDTO $dto)
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id)
    {
        $this->repository->delete($id);
    }
}

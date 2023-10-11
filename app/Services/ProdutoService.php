<?php

namespace App\Services;

use App\Repositories\ProdutoRepositoryInterface;

class ProdutoService
{
    private $repository;

    public function __construct(
        ProdutoRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function findByName(string $nome)
    {
        $produto = $this->repository->findByName($nome);

        return $produto;
    }

    public function findById(string $id)
    {
        $produto = $this->repository->findById($id);

        return $produto;
    }

    public function getAll(string $search = null)
    {
        $produtos = $this->repository->getAll($search);

        return $produtos;
    }

    public function create(array $data)
    {
        $produto = $this->repository->create($data);

        return $produto;
    }

    public function update(string $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete(string $id)
    {
        $this->repository->delete($id);
    }
}

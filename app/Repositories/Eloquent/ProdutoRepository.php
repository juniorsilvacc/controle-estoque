<?php

namespace App\Repositories\Eloquent;

use App\DTO\CreateProdutoDTO;
use App\DTO\UpdateProdutoDTO;
use App\Models\Produto;
use App\Repositories\ProdutoRepositoryInterface;

class ProdutoRepository implements ProdutoRepositoryInterface
{
    private $model;

    public function __construct(
        Produto $model
    ) {
        $this->model = $model;
    }

    public function findByName(string $nome)
    {
        $produto = $this->model->find($nome);

        if (!$produto) {
            return null;
        }

        return $produto;
    }

    public function findById(string $id)
    {
        $produto = $this->model->find($id);

        if (!$produto) {
            return null;
        }

        return $produto;
    }

    public function getAll()
    {
        $produtos = $this->model->paginate(5);

        return $produtos;
    }

    public function create(CreateProdutoDTO $dto)
    {
        $produto = $this->model->create((array) $dto);

        return $produto->toArray();
    }

    public function update(UpdateProdutoDTO $dto)
    {
        if (!$produto = $this->model->find($dto->id)) {
            return null;
        }

        $produto->update(
            (array) $dto
        );

        return (object) $produto->toArray();
    }

    public function delete(string $id)
    {
        $this->model->findOrFail($id)->delete();
    }
}

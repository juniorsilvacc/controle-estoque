<?php

namespace App\Repositories\Eloquent;

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

    public function create(array $data)
    {
        $produto = $this->model->create($data);

        return $produto;
    }

    public function update(string $id, array $data)
    {
        if (!$produto = $this->findById($id)) {
            return null;
        }

        $produto->update($data);

        return $produto;
    }

    public function delete(string $id)
    {
        $this->model->findOrFail($id)->delete();
    }
}

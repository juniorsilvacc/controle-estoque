<?php

namespace App\Repositories\Eloquent;

use App\DTO\CreateFornecedorDTO;
use App\DTO\UpdateFornecedorDTO;
use App\Models\Fornecedor;
use App\Repositories\FornecedorRepositoryInterface;

class FornecedorRepository implements FornecedorRepositoryInterface
{
    private $model;

    public function __construct(
        Fornecedor $model
    ) {
        $this->model = $model;
    }

    public function findByName(string $nome)
    {
        $fornecedor = $this->model->find($nome);

        if (!$fornecedor) {
            return null;
        }

        return $fornecedor;
    }

    public function findById(string $id)
    {
        $fornecedor = $this->model->find($id);

        if (!$fornecedor) {
            return null;
        }

        return $fornecedor;
    }

    public function getAll(string $filter = null)
    {
        $fornecedor = $this->model->paginate(5);

        return $fornecedor;
    }

    public function create(CreateFornecedorDTO $dto)
    {
        $fornecedor = $this->model->create((array) $dto);

        return $fornecedor->toArray();
    }

    public function update(UpdateFornecedorDTO $dto)
    {
        if (!$fornecedor = $this->model->find($dto->id)) {
            return null;
        }

        $fornecedor->update(
            (array) $dto
        );

        return (object) $fornecedor->toArray();
    }

    public function delete(string $id)
    {
        $this->model->findOrFail($id)->delete();
    }
}

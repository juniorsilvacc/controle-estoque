<?php

namespace App\Repositories\Eloquent;

use App\DTO\CreateCategoriaDTO;
use App\DTO\UpdateCategoriaDTO;
use App\Models\Categoria;
use App\Repositories\CategoriaRepositoryInterface;

class CategoriaRepository implements CategoriaRepositoryInterface
{
    private $model;

    public function __construct(
        Categoria $model
    ) {
        $this->model = $model;
    }

    public function findByName(string $nome)
    {
        $categoria = $this->model->find($nome);

        if (!$categoria) {
            return null;
        }

        return $categoria;
    }

    public function findById(string $id)
    {
        $categoria = $this->model->find($id);

        if (!$categoria) {
            return null;
        }

        return $categoria;
    }

    public function getAll()
    {
        $categorias = $this->model->paginate(5);

        return $categorias;
    }

    public function create(CreateCategoriaDTO $dto)
    {
        $categoria = $this->model->create((array) $dto);

        return $categoria->toArray();
    }

    public function update(UpdateCategoriaDTO $dto)
    {
        if (!$categoria = $this->model->find($dto->id)) {
            return null;
        }

        $categoria->update(
            (array) $dto
        );

        return (object) $categoria->toArray();
    }

    public function delete(string $id)
    {
        $this->model->findOrFail($id)->delete();
    }
}

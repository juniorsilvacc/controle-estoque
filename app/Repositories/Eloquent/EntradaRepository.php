<?php

namespace App\Repositories\Eloquent;

use App\Models\Entrada;
use App\Repositories\EntradaRepositoryInterface;

class EntradaRepository implements EntradaRepositoryInterface
{
    private $model;

    public function __construct(
        Entrada $model
    ) {
        $this->model = $model;
    }

    public function findById(string $id)
    {
        $entrada = $this->model->find($id);

        if (!$entrada) {
            return null;
        }

        return $entrada;
    }

    public function create(array $data)
    {
        $entrada = $this->model->create($data);

        return $entrada;
    }

    public function getAll()
    {
        $entradas = $this->model->paginate(5);

        return $entradas;
    }
}

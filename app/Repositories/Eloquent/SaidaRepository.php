<?php

namespace App\Repositories\Eloquent;

use App\Models\Saida;
use App\Repositories\SaidaRepositoryInterface;

class SaidaRepository implements SaidaRepositoryInterface
{
    private $model;

    public function __construct(
        Saida $model
    ) {
        $this->model = $model;
    }

    public function findById(string $id)
    {
        $saida = $this->model->find($id);

        if (!$saida) {
            return null;
        }

        return $saida;
    }

    public function create(array $data)
    {
        $saida = $this->model->create($data);

        return $saida;
    }

    public function getAll()
    {
        $saidas = $this->model->paginate(5);

        return $saidas;
    }
}

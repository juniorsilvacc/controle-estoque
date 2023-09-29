<?php

namespace App\Repositories\Eloquent;

use App\Models\Cliente;
use App\Repositories\ClienteRepositoryInterface;

class ClienteRepository implements ClienteRepositoryInterface
{
    private $model;

    public function __construct(
        Cliente $model
    ) {
        $this->model = $model;
    }

    public function getAll()
    {
        $clientes = $this->model->paginate(5);

        return $clientes;
    }
}

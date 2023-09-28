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

    public function getAll(string $filter = ''): array
    {
        $clientes = $this->model->where(
            function ($query) use ($filter) {
                if ($filter) {
                    $query->where('email', $filter);
                    $query->orWhere('nome', 'LIKE', "%{$filter}%");
                }
            })
            ->get();

        return $clientes->toArray();
    }
}

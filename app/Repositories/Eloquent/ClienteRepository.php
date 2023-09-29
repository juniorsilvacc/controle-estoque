<?php

namespace App\Repositories\Eloquent;

use App\DTO\CreateClienteDTO;
use App\DTO\UpdateClienteDTO;
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

    public function findByName(string $nome)
    {
        $cliente = $this->model->find($nome);

        if (!$cliente) {
            return null;
        }

        return $cliente;
    }

    public function findByEmail(string $email)
    {
        $cliente = $this->model->find($email);

        if (!$cliente) {
            return null;
        }

        return $cliente;
    }

    public function findById(string $id)
    {
        $cliente = $this->model->find($id);

        if (!$cliente) {
            return null;
        }

        return $cliente;
    }

    public function getAll()
    {
        $clientes = $this->model->paginate(5);

        return $clientes;
    }

    public function create(CreateClienteDTO $dto)
    {
        $cliente = $this->model->create((array) $dto);

        return $cliente->toArray();
    }

    public function update(UpdateClienteDTO $dto)
    {
        if (!$cliente = $this->model->find($dto->id)) {
            return null;
        }

        $cliente->update(
            (array) $dto
        );

        return (object) $cliente->toArray();
    }

    public function delete(string $id)
    {
        $this->model->findOrFail($id)->delete();
    }
}

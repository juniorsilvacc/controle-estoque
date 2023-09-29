<?php

namespace App\Repositories;

use App\DTO\CreateClienteDTO;
use App\DTO\UpdateClienteDTO;

interface ClienteRepositoryInterface
{
    public function findByName(string $nome);

    public function findByEmail(string $email);

    public function findById(string $id);

    public function getAll();

    public function create(CreateClienteDTO $dto);

    public function update(UpdateClienteDTO $dto);
}

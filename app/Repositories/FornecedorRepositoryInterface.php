<?php

namespace App\Repositories;

use App\DTO\CreateFornecedorDTO;
use App\DTO\UpdateFornecedorDTO;

interface FornecedorRepositoryInterface
{
    public function findByName(string $nome);

    public function findById(string $id);

    public function getAll(string $filter = null);

    public function create(CreateFornecedorDTO $dto);

    public function update(UpdateFornecedorDTO $dto);

    public function delete(string $id);
}

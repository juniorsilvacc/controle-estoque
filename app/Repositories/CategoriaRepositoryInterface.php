<?php

namespace App\Repositories;

use App\DTO\CreateCategoriaDTO;
use App\DTO\UpdateCategoriaDTO;

interface CategoriaRepositoryInterface
{
    public function findByName(string $nome);

    public function findById(string $id);

    public function getAll();

    public function create(CreateCategoriaDTO $dto);

    public function update(UpdateCategoriaDTO $dto);

    public function delete(string $id);
}

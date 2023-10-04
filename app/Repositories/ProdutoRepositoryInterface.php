<?php

namespace App\Repositories;

use App\DTO\CreateProdutoDTO;
use App\DTO\UpdateProdutoDTO;

interface ProdutoRepositoryInterface
{
    public function findByName(string $nome);

    public function findById(string $id);

    public function getAll();

    public function create(CreateProdutoDTO $dto);

    public function update(UpdateProdutoDTO $dto);

    public function delete(string $id);
}

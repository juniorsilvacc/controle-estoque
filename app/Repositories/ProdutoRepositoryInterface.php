<?php

namespace App\Repositories;

interface ProdutoRepositoryInterface
{
    public function findByName(string $nome);

    public function findById(string $id);

    public function getAll();

    public function create(array $data);

    public function update(string $id, array $data);

    public function delete(string $id);
}

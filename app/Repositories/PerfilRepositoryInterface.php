<?php

namespace App\Repositories;

interface PerfilRepositoryInterface
{
    public function details(string $id);

    public function update(string $id, array $data);
}

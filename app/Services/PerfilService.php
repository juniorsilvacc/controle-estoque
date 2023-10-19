<?php

namespace App\Services;

use App\Repositories\PerfilRepositoryInterface;

class PerfilService
{
    private $repository;

    public function __construct(
        PerfilRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function details($id)
    {
        $user = $this->repository->details($id);

        return $user;
    }

    public function update(string $id, array $data)
    {
        return $this->repository->update($id, $data);
    }
}

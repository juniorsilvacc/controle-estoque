<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\PerfilRepositoryInterface;

class PerfilRepository implements PerfilRepositoryInterface
{
    private $model;

    public function __construct(
        User $model
    ) {
        $this->model = $model;
    }

    public function details(string $id)
    {
        $user = $this->model->find($id);

        if (!$user) {
            return null;
        }

        return $user;
    }

    public function update(string $id, array $data)
    {
        if (!$user = $this->findById($id)) {
            return null;
        }

        $user->update($data);

        return $user;
    }
}

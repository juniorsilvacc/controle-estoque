<?php

namespace App\DTO;

use App\Http\Requests\UpdateCategoria;

class UpdateCategoriaDTO
{
    public function __construct(
        public int $id,
        public string $nome,
    ) {
    }

    public static function makeFromRequest(UpdateCategoria $request): self
    {
        return new self(
            $request->id,
            $request->nome,
        );
    }
}

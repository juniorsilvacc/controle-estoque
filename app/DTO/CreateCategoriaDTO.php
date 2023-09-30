<?php

namespace App\DTO;

use App\Http\Requests\CreateCategoria;

class CreateCategoriaDTO
{
    public function __construct(
        public string $nome,
    ) {
    }

    public static function makeFromRequest(CreateCategoria $request): self
    {
        return new self(
            $request->nome,
        );
    }
}

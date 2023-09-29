<?php

namespace App\DTO;

use App\Http\Requests\CreateCliente;

class CreateClienteDTO
{
    public function __construct(
        public string $nome,
        public string $email,
    ) {
    }

    public static function makeFromRequest(CreateCliente $request): self
    {
        return new self(
            $request->nome,
            $request->email,
        );
    }
}

<?php

namespace App\DTO;

use App\Http\Requests\UpdateCliente;

class UpdateClienteDTO
{
    public function __construct(
        public int $id,
        public string $nome,
        public ?string $email = null,
        public ?int $user_id = null,
    ) {
    }

    public static function makeFromRequest(UpdateCliente $request): self
    {
        return new self(
            $request->id,
            $request->nome,
            $request->email,
            $request->user_id,
        );
    }
}

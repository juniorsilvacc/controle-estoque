<?php

namespace App\DTO;

use App\Http\Requests\CreateFornecedor;

class CreateFornecedorDTO
{
    public function __construct(
        public string $nome,
        public string $empresa,
        public string $email,
        public string $cnpj,
        public ?int $estado_id = null,
        public ?int $user_id = null,
    ) {
    }

    public static function makeFromRequest(CreateFornecedor $request): self
    {
        return new self(
            $request->nome,
            $request->empresa,
            $request->email,
            $request->cnpj,
            $request->estado_id,
            $request->user_id,
        );
    }
}

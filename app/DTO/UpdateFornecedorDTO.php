<?php

namespace App\DTO;

use App\Http\Requests\UpdateFornecedor;

class UpdateFornecedorDTO
{
    public function __construct(
        public string $id,
        public string $nome,
        public string $empresa,
        public string $email,
        public string $cnpj,
        public ?int $estado_id = null,
        public ?int $user_id = null,
    ) {
    }

    public static function makeFromRequest(UpdateFornecedor $request): self
    {
        return new self(
            $request->id,
            $request->nome,
            $request->empresa,
            $request->email,
            $request->cnpj,
            $request->estado_id,
            $request->user_id,
        );
    }
}

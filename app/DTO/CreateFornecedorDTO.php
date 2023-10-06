<?php

namespace App\DTO;

use App\Http\Requests\CreateFornecedor;

class CreateFornecedorDTO
{
    public function __construct(
        public string $nome,
        public string $empresa,
        public ?string $email = null,
        public string $telefone,
        public ?string $endereco = null,
        public string $cnpj,
        public string $tipo,
        public ?string $observacoes = null,
        public ?int $user_id = null,
    ) {
    }

    public static function makeFromRequest(CreateFornecedor $request): self
    {
        return new self(
            $request->nome,
            $request->empresa,
            $request->email,
            $request->telefone,
            $request->endereco,
            $request->cnpj,
            $request->tipo,
            $request->observacoes,
            $request->user_id,
        );
    }
}

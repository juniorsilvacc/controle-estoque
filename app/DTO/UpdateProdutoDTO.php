<?php

namespace App\DTO;

use App\Http\Requests\UpdateProduto;

class UpdateProdutoDTO
{
    public function __construct(
        public string $nome,
        public string $preco,
        public string $preco_venda,
        public string $estoque_inicial,
        public string $estoque_minimo,
        public string $data_produto,
    ) {
    }

    public static function makeFromRequest(UpdateProduto $request): self
    {
        return new self(
            $request->id,
            $request->nome,
            $request->preco,
            $request->preco_venda,
            $request->estoque_inicial,
            $request->estoque_minimo,
            $request->data_produto,
        );
    }
}

<?php

namespace App\DTO;

use App\Http\Requests\CreateProduto;
use Carbon\Carbon;

class CreateProdutoDTO
{
    public function __construct(
        public string $nome,
        public int $cod_referencia,
        public ?string $descricao = null,
        public string $unidade_medida,
        public string $preco_unitario,
        public string $preco_venda,
        public int $estoque,
        public Carbon $data_fabricacao,
        public Carbon $data_validade,
        public ?int $fornecedor_id = null,
        public ?int $categoria_id = null,
        public ?int $user_id = null,
    ) {
    }

    public static function makeFromRequest(CreateProduto $request): self
    {
        $dataFabricacao = Carbon::parse($request->data_fabricacao);
        $dataValidade = Carbon::parse($request->data_validade);

        return new self(
            $request->nome,
            $request->cod_referencia,
            $request->descricao,
            $request->unidade_medida,
            $request->preco_unitario,
            $request->preco_venda,
            $request->estoque,
            $dataFabricacao,
            $dataValidade,
            $request->fornecedor_id,
            $request->categoria_id,
            $request->user_id,
        );
    }
}

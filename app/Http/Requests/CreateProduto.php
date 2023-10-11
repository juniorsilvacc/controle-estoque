<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => [
                'required',
                'min: 3',
                'max: 100',
                'string',
                'unique:produtos,nome,nome',
            ],
            'cod_referencia' => [
                'required',
                'numeric',
                'unique:produtos,cod_referencia,cod_referencia',
            ],
            'descricao' => [
                'nullable',
                'string',
                'max: 255',
            ],
            'unidade_medida' => [
                'string',
            ],
            'preco_unitario' => [
                'required',
            ],
            'preco_venda' => [
                'required',
            ],
            'estoque' => [
                'required',
                'numeric',
            ],
            'data_fabricacao' => [
                'date',
            ],
            'data_validade' => [
                'date',
            ],
            'user_id' => [
                'numeric',
            ],
            'fornecedor_id' => [
                'numeric',
            ],
            'categoria_id' => [
                'numeric',
            ],
        ];
    }
}

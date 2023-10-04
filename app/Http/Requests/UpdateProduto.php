<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduto extends FormRequest
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
                'max: 255',
                'string',
                "unique:produtos,nome,{$this->id},id",
            ],
            'preco' => [
                'required',
                'numeric',
            ],
            'preco_venda' => [
                'required',
                'numeric',
            ],
            'estoque_inicial' => [
                'numeric',
            ],
            'estoque_minimo' => [
                'numeric',
            ],
            'data_produto' => [
                'date',
            ],
        ];
    }
}

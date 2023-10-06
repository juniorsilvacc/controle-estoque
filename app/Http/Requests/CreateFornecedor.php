<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFornecedor extends FormRequest
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
            ],
            'empresa' => [
                'required',
                'min: 3',
                'max: 100',
                'string',
            ],
            'email' => [
                'nullable',
                'email',
            ],
            'telefone' => [
                'string',
                'size:11',
            ],
            'cnpj' => [
                'required',
                'size:14',
                'string',
                'unique:fornecedores,cnpj,cnpj',
            ],
            'endereco' => [
                'nullable',
                'string',
            ],
            'tipo' => [
                'string',
            ],
            'observacoes' => [
                'nullable',
                'string',
                'max: 255',
            ],
        ];
    }
}

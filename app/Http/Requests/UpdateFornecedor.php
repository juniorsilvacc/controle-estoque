<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFornecedor extends FormRequest
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
            ],
            'empresa' => [
                'required',
                'min: 3',
                'max: 255',
                'string',
            ],
            'email' => [
                'email',
                "unique:fornecedores,email,{$this->id},id",
            ],
            'cnpj' => [
                'string',
                "unique:fornecedores,cnpj,{$this->id},id",
            ],
        ];
    }
}

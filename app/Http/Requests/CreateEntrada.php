<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEntrada extends FormRequest
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
            'quantidade' => [
                'required',
                'min: 1',
            ],
            'data_entrada' => [
                'date',
            ],
            'observacoes' => [
                'nullable',
            ],
            'fornecedor_id' => [
                'required',
            ],
            'produto_id' => [
                'required',
            ],
        ];
    }
}

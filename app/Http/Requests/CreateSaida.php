<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSaida extends FormRequest
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
            'data_saida' => [
                'required',
                'date',
            ],
            'observacoes' => [
                'nullable',
            ],
            'cliente_id' => [
                'required',
            ],
            'produto_id' => [
                'required',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'nome_usuario' => [
                'string',
                'min:3',
                'max:20',
                "unique:users,nome_usuario,{$this->id},id",
            ],
            'primeiro_nome' => [
                'string',
                'min:3',
                'max:15',
            ],
            'ultimo_nome' => [
                'string',
                'min:3',
                'max:15',
            ],
            'telefone' => [
                'string',
                'max:20',
            ],
            'email' => [
                'email',
                'max:20',
                "unique:users,email,{$this->id},id",
            ],
            'data_nascimento' => [
                'date',
            ],
        ];
    }
}

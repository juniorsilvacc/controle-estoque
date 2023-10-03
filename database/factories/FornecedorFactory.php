<?php

namespace Database\Factories;

use App\Models\Estado;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->word,
            'empresa' => fake()->word,
            'email' => fake()->unique()->safeEmail(),
            'cnpj' => function () {
                $cnpj = '';
                for ($i = 0; $i < 14; ++$i) {
                    $cnpj .= rand(0, 9);
                }

                return $cnpj;
            },
            'user_id' => User::all()->random(),
            'estado_id' => Estado::all()->random(),
        ];
    }
}

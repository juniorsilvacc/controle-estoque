<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Fornecedor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->unique()->word,
            'preco' => fake()->randomFloat(2, 10, 100),
            'preco_venda' => fake()->randomFloat(2, 100, 200),
            'estoque_inicial' => fake()->numberBetween(1, 100),
            'estoque_minimo' => fake()->numberBetween(1, 20),
            'data_produto' => now(),
            'fornecedor_id' => Fornecedor::all()->random(),
            'categoria_id' => Categoria::all()->random(),
            'user_id' => User::all()->random(),
        ];
    }
}

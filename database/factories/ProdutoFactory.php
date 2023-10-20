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
        $statusEnum = ['UN', 'PC', 'LT', 'KG'];

        $dataFabricacao = fake()->dateTimeBetween('-5 years', 'now');
        $dataValidade = fake()->dateTimeBetween($dataFabricacao, '+3 years');

        return [
            'nome' => fake()->unique()->word,
            'cod_referencia' => fake()->unique()->randomNumber(6),
            'descricao' => fake()->sentence,
            'unidade_medida' => fake()->randomElement($statusEnum),
            'preco_unitario' => fake()->randomFloat(2, 1, 500),
            'preco_venda' => fake()->randomFloat(2, 500, 1000),
            'estoque' => fake()->numberBetween(1, 100),
            'data_fabricacao' => $dataFabricacao,
            'data_validade' => $dataValidade,
            'fornecedor_id' => Fornecedor::all()->random(),
            'categoria_id' => Categoria::all()->random(),
            'user_id' => User::all()->random(),
        ];
    }
}

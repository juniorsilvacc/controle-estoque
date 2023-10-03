<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
            ClienteTableSeeder::class,
            EstadoTableSeeder::class,
            CidadeTableSeeder::class,
            CategoriaTableSeeder::class,
            FornecedorTableSeeder::class,
            ProdutoTableSeeder::class,
        ]);
    }
}

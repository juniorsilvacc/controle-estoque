<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->decimal('preco', 8, 2);
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_inicial');
            $table->integer('estoque_minimo');
            $table->date('data_produto');
            $table->foreignId('fornecedor_id')->constrained('fornecedores');
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign(['fornecedor_id']);
            $table->dropForeign(['categoria_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('produtos');
    }
};

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
            $table->string('cod_referencia')->unique();
            $table->text('descricao')->nullable();
            $table->string('unidade_medida'); // Enum: UN, PC, LT, KG
            $table->string('preco_unitario', 10, 2)->default(0.00);
            $table->string('preco_venda', 10, 2);
            $table->integer('estoque')->default(1);
            $table->string('image')->nullable();
            $table->date('data_fabricacao')->nullable();
            $table->date('data_validade')->nullable();

            $table->foreignId('fornecedor_id')->constrained('fornecedores')->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
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

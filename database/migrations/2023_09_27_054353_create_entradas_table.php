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
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 10, 2);
            $table->date('data_entrada');
            $table->text('observacoes')->nullable();

            $table->foreignId('produto_id')->constrained('produtos');
            $table->foreignId('fornecedor_id')->constrained('fornecedores');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entradas', function (Blueprint $table) {
            $table->dropForeign(['produto_id']);
            $table->dropForeign(['fornecedor_id']);
        });

        Schema::dropIfExists('entradas');
    }
};

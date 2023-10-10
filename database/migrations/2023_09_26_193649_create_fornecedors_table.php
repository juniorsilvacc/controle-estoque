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
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('empresa');
            $table->string('email')->unique()->nullable();
            $table->string('telefone');
            $table->string('endereco')->nullable();
            $table->string('cnpj', 18)->unique();
            $table->string('tipo'); // Enum: fabricante, distribuidor, atacadista
            $table->text('observacoes')->nullable();

            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('fornecedores');
    }
};

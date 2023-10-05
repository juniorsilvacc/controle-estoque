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
            $table->string('email')->unique();
            $table->string('cnpj')->unique();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('estado_id')->constrained('estados');
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
            $table->dropForeign(['estado_id']);
        });

        Schema::dropIfExists('fornecedores');
    }
};

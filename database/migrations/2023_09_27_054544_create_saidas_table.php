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
        Schema::create('saidas', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->date('data_saida');
            $table->text('observacoes')->nullable();

            $table->foreignId('produto_id')->constrained('produtos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('saidas', function (Blueprint $table) {
            $table->dropForeign(['produto_id']);
        });

        Schema::dropIfExists('saidas');
    }
};

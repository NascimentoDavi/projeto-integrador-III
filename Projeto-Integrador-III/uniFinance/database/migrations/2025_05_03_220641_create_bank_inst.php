<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bank_inst', function (Blueprint $table) {
            $table->id();

            // Nome da Instituicao Bancaria
            $table->string('name');

            // Codigo do Banco | Limite de 10 caracteres para a string
            $table->string('code', 10);

            // Caminho para a imagem
            $table->string('imagem_path')->nullable();

            // Cria Colunas created_at e updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_inst');
    }
};

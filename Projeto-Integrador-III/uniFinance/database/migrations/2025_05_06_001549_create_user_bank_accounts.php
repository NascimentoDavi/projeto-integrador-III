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
        Schema::create('user_bank_accounts', function (Blueprint $table) {
            $table->id(); // ID único para cada registro de conta bancária de usuário

            // Foreign Keys
            $table->unsignedBigInteger('user_id'); // Chave estrangeira para a tabela users
            $table->unsignedBigInteger('bank_account_id'); // Chave estrangeira para a tabela bank_accounts

            // Valor atual
            $table->decimal('current_balance', 15, 2)->default(0);

            // created_at e updated_at
            $table->timestamps();

            // Definindo as chaves estrangeiras
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Relacionamento com a tabela users
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts')->onDelete('cascade'); // Relacionamento com a tabela bank_accounts
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Deleta a tabela 'user_bank_accounts' ao reverter a migration
        Schema::dropIfExists('user_bank_accounts');
    }
};

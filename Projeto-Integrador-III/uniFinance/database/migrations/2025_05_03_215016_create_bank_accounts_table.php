<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\BankAccountType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();

            // Numero da conta e nome da conta
            $table->string('account_number');
            $table->string('bank_name');

            // Chave Estrangeira para ID de bank_inst
            $table->unsignedBigInteger('bank_inst_id');
            $table->foreign('bank_inst_id')->references('id')->on('bank_inst')->onDelete('cascade');

            // Tipo de conta
            $table->enum('account_type', BankAccountType::values());

            // Saldo Inicial e Atual (15 : Quantidade total de digitos | 2 : Quantidade total de casas decimais)
            $table->decimal('initial_balance', 15, 2)->setDefault(0);
            $table->decimal('current_balance', 15, 2)->setDefault(0);

            // Se usuario for deletado, contas tambem são deletadas
            $table->foreignId('user_id')->constrained()->onDelete('cascade');


            // Cria colunas created_at e updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove as chaves estrangeiras antes de remover as tabelas
        Schema::table('bank_accounts', function(Blueprint $table) {
            $table->dropForeign(['bank_inst_id']); // Remove chave estrangeira bank_inst_id (Bank_Ins)
            $table->dropForeign(['user_id']); // Remove chave estrangeira user_id (User)
        });

        // Depois de remover as chaves estrangeiras, podemos deletar a tabela
        Schema::dropIfExists('bank_accounts');
    }
};

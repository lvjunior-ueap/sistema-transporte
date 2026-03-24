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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('motorista_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('veiculo_id')->constrained();

            $table->dateTime('data_saida');
            $table->dateTime('data_retorno');

            $table->string('origem');
            $table->string('destino');
            $table->text('motivo');

            $table->enum('status', ['pendente', 'aprovado', 'recusado', 'concluido'])
                ->default('pendente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};

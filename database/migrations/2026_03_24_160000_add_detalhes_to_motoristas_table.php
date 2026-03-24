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
        Schema::table('motoristas', function (Blueprint $table) {
            $table->string('nome')->nullable()->after('id');
            $table->string('cpf')->nullable()->after('nome');
            $table->string('telefone')->nullable()->after('cpf');
            $table->string('categoria_cnh', 5)->nullable()->after('telefone');
            $table->date('validade_cnh')->nullable()->after('categoria_cnh');
            $table->boolean('ativo')->default(true)->after('validade_cnh');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('motoristas', function (Blueprint $table) {
            $table->dropColumn([
                'nome',
                'cpf',
                'telefone',
                'categoria_cnh',
                'validade_cnh',
                'ativo',
            ]);
        });
    }
};

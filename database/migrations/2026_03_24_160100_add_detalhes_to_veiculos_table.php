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
        Schema::table('veiculos', function (Blueprint $table) {
            $table->string('modelo')->nullable()->after('id');
            $table->string('placa')->nullable()->after('modelo');
            $table->string('cor', 50)->nullable()->after('placa');
            $table->unsignedInteger('capacidade')->nullable()->after('cor');
            $table->boolean('ativo')->default(true)->after('capacidade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('veiculos', function (Blueprint $table) {
            $table->dropColumn([
                'modelo',
                'placa',
                'cor',
                'capacidade',
                'ativo',
            ]);
        });
    }
};

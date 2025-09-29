<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50)->nullable();
            $table->string('telefone', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('tipo', 1)->nullable();
            $table->string('funcao', 50)->nullable();
            $table->date('data_admissao')->nullable();
            $table->boolean('usuario_sistema')->nullable();
            $table->boolean('situacao')->nullable();
            $table->string('observacoes', 3000)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};

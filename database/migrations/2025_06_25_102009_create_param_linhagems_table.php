<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('param_linhagem', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 50)->nullable();
            $table->integer('fornecedor_id')->nullable();
            $table->integer('idade_postura_ini')->nullable();
            $table->integer('desempenho_medio')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('param_linhagem');
    }
};

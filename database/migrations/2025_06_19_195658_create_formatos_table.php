<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('formatos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 50)->nullable();
            $table->string('tipo', 50)->nullable(); // enum
            $table->integer('qtde_ovos')->nullable();
            $table->integer('qtde_cartelas')->nullable();
            $table->string('unidade_venda', 50)->nullable();
            $table->boolean('situacao')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formatos');
    }
};

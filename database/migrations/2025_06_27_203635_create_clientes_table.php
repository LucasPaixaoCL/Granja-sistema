<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50)->nullable();
            $table->string('tipo', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('telefone', 16)->nullable();
            $table->string('endereco', 100)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('cep', 10)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};

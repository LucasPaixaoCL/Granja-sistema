<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estoque', function (Blueprint $table) {
            $table->id();
            $table->string('item', 50)->nullable();
            $table->string('tipo', 50)->nullable();
            $table->integer('qtde')->nullable();
            $table->string('unidade_medida', 50)->nullable();
            $table->date('validade')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estoque');
    }
};

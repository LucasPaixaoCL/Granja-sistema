<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('param_fase_ave', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 60)->nullable();
            $table->integer('semana_inicial')->nullable();
            $table->integer('semana_final')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('param_fase_ave');
    }
};

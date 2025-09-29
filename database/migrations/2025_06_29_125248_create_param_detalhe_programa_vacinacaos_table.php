<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('param_detalhes_programa_vacinacao', function (Blueprint $table) {
            $table->id();
            $table->integer('param_programa_vacinacao_id')->nullable();
            $table->integer('dia')->nullable();
            $table->integer('semana')->nullable();
            $table->string('enfermidade', 50)->nullable();
            $table->integer('param_via_aplicacao_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('param_detalhes_programa_vacinacao');
    }
};

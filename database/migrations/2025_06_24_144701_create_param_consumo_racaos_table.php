<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('param_consumo_racao', function (Blueprint $table) {
            $table->id();
            $table->integer('semana')->nullable();
            $table->integer('consumo_dia')->nullable();
            $table->integer('consumo_semana')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('param_consumo_racao');
    }
};

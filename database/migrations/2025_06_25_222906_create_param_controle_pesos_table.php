<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('param_controle_peso', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('param_linhagem_id')->nullable();
            $table->integer('semana')->nullable();
            $table->integer('peso_min')->nullable();
            $table->integer('peso_max')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('param_controle_peso');
    }
};

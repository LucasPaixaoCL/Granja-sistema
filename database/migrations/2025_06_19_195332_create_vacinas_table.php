<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vacinas', function (Blueprint $table) {
            $table->id();
            $table->integer('lote_id')->nullable();
            $table->integer('param_programa_vacinacao_id')->nullable();
            $table->datetime('data_prevista')->nullable();
            $table->datetime('data_realizada')->nullable();
            $table->string('fabricante', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vacinas');
    }
};

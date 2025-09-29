<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coleta_ovos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('galpao_id')->nullable();
            $table->bigInteger('lote_id')->nullable();
            $table->integer('semana')->nullable();
            $table->datetime('data_coleta');
            $table->integer('qtde_ovos')->nullable();
            $table->text('observacoes', 3000)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coleta_ovos');
    }
};

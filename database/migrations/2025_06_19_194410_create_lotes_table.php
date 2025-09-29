<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->integer('nucleo_id')->nullable();
            $table->integer('galpao_id')->nullable();
            $table->integer('linhagem_id')->nullable();
            $table->integer('num_lote')->nullable();
            $table->datetime('data_lote')->nullable();
            $table->integer('qtde_aves')->nullable();
            $table->integer('qtde_machos')->nullable();
            $table->boolean('situacao')->nullable();
            $table->text('observacoes', 3000)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};

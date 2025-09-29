<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mortes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lote_id')->nullable();
            $table->integer('semana')->nullable();
            $table->datetime('data_morte');
            $table->integer('qtde_mortes')->nullable();
            $table->string('causa_mortes', 50)->nullable();
            $table->text('observacoes', 3000)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mortes');
    }
};

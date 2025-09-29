<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('controle_peso', function (Blueprint $table) {
            $table->id();
            $table->integer('lote_id')->nullable();
            $table->integer('semana')->nullable();
            $table->date('data_pesagem')->nullable();
            $table->decimal('peso_real', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('controle_peso');
    }
};

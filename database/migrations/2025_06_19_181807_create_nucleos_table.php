<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nucleos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('descricao', 100)->nullable();
            $table->decimal('area_total', 10, 2)->nullable();
            $table->boolean('situacao')->nullable();
            $table->text('observacoes', 3000)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nucleos');
    }
};

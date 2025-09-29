<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galpoes', function (Blueprint $table) {
            $table->id();
            $table->integer('nucleo_id')->nullable();
            $table->string('descricao', 50)->nullable();
            $table->decimal('largura', 10, 2)->nullable();
            $table->decimal('comprimento', 10, 2)->nullable();
            $table->integer('densidade')->nullable();

            $table->string('tipo_cobertura', 50)->nullable();
            $table->string('cama', 50)->nullable();
            $table->decimal('altura_pe_direito', 10, 2)->nullable();

            $table->boolean('situcao')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galpoes');
    }
};

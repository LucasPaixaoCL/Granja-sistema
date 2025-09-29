<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->id();
            $table->datetime('data_pedido')->nullable();
            $table->datetime('data_vencimento')->nullable();
            $table->datetime('data_pagamento')->nullable();
            $table->decimal('vlr_cobranca', 10, 2)->nullable();
            $table->decimal('vlr_pago', 10, 2)->nullable();
            $table->decimal('multa_juros', 10, 2)->nullable();
            $table->string('descricao', 100)->nullable();
            $table->integer('tipo_id')->nullable();
            $table->integer('natureza_id')->nullable();
            $table->integer('categoria_id')->nullable();
            $table->integer('situacao')->nullable();
            $table->bigInteger('forma_pgto_id')->nullable();
            $table->string('quem_pagou', 60)->nullable();
            $table->text('observacoes', 3000)->nullable();
            $table->string('comprovante', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('despesas');
    }
};

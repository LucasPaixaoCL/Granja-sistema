<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->datetime('data_venda')->nullable();;
            $table->integer('formato_id')->nullable();
            $table->string('tipo', 100)->nullable();
            $table->string('tamanho', 100)->nullable();
            $table->integer('qtde')->nullable();
            $table->decimal('valor_unit', 10, 2)->nullable();
            $table->decimal('desconto', 10, 2)->nullable();
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->integer('funcionario_id')->nullable();
            $table->integer('cliente_id')->nullable();
            $table->integer('situacao_id')->nullable();
            $table->integer('forma_pgto_id')->nullable();
            $table->datetime('data_pgto')->nullable();
            $table->integer('qtde_ovos')->nullable();
            $table->text('observacoes', 3000)->nullable();
            $table->string('comprovante', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};

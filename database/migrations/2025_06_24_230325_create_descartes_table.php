<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('descartes', function (Blueprint $table) {
            $table->id();
            $table->datetime('data_descarte')->nullable();
            $table->integer('qtde_ovos')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('descartes');
    }
};

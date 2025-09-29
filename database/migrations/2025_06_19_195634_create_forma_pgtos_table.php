<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('formas_pgto', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formas_pgto');
    }
};

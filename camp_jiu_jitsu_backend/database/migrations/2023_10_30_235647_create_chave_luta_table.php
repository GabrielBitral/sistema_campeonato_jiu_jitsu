<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chave_luta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codigo_campeonato');
            $table->foreign('codigo_campeonato')->references('id')->on('campeonato');
            $table->set('faixa', ['Marrom', 'Preta']);
            $table->set('peso', ['Leve', 'Pesado']);
            $table->string('atletas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chave_luta');
    }
};

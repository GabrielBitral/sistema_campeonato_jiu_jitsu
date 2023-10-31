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
        Schema::create('resultado', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('codigo_campeonato');
            $table->foreign('codigo_campeontato')->references('id')->on('campeonato');

            $table->set('faixa', ['Marrom', 'Preta']);
            $table->set('peso', ['Leve', 'Pesado']);

            $table->unsignedBigInteger('primeiro_colocado');
            $table->foreign('primeiro_colocado')->references('id')->on('atleta');
            
            $table->unsignedBigInteger('segundo_colocado');
            $table->foreign('segundo_colocado')->references('id')->on('atleta');
            
            $table->unsignedBigInteger('terceiro_colocado');
            $table->foreign('terceiro_colocado')->references('id')->on('atleta');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultado');
    }
};

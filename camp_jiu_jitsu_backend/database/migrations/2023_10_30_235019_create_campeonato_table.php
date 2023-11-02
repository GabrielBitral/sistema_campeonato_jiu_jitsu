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
        Schema::create('campeonato', function (Blueprint $table) {
            $table->id();
            $table->set('status', ['Ativo', 'Inativo'])->nullable(false);
            $table->date('data_realizacao')->nullable(false);
            $table->string('estado_cidade')->nullable(false);
            $table->string('sobre')->nullable(false);
            $table->set('tipo', ['Kimono', 'No-Gi'])->nullable(false);
            $table->string('ginasio')->nullable(false);
            $table->string('titulo')->nullable(false);
            $table->set('fase', ['Inscrições Abertas', 'Chaves de Lutas', 'Resultados'])->nullable(false);
            $table->string('imagem')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campeonato');
    }
};

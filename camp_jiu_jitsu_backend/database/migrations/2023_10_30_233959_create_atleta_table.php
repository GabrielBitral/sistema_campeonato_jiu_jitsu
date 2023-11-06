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
        Schema::create('atleta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->date('data_nascimento')->nullable(false);
            $table->string('cpf')->nullable(false);
            $table->set('sexo', ['Masculino', 'Feminino'])->nullable(false);
            $table->string('equipe')->nullable(false);
            $table->set('faixa', ['Marrom', 'Preta'])->nullable(false);
            $table->set('peso', ['Leve', 'Pesado'])->nullable(false);
            $table->date('data_inscricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atleta');
    }
};

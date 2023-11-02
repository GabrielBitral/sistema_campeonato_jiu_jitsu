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
        Schema::create('atleta_chave', function (Blueprint $table) {
            $table->unsignedBigInteger('codigo_chave');
            $table->foreign('codigo_chave')->references('id')->on('chave_luta');
            $table->unsignedBigInteger('codigo_atleta');
            $table->foreign('codigo_atleta')->references('id')->on('atleta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atleta_chave');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable(false);
            $table->string('email')->unique();
            $table->string('senha');
            $table->tinyInteger('tipo')
                ->default(0)->comment('0-> Atleta; 1-> Usuário Painel; 2-> Admin;');
            $table->timestamps();
        });

        DB::table('users')
            ->insert(
                [
                    'nome' => 'admin',
                    'email' => 'admin@example.com',
                    'senha' => '$2y$10$dtiyvr3Al4u7S92sJwX16.AX2gC20Pz.NCFA6ld4rD0DR7leVAQsm',
                    'tipo' => 2,
                ]
            );

        DB::table('users')
            ->insert(
                [
                    'nome' => 'usuario',
                    'email' => 'usuario@example.com',
                    'senha' => '$2y$10$dtiyvr3Al4u7S92sJwX16.AX2gC20Pz.NCFA6ld4rD0DR7leVAQsm',
                    'tipo' => 1,
                ]
            );

        DB::table('users')
            ->insert(
                [
                    'nome' => 'atleta',
                    'email' => 'atleta@example.com',
                    'senha' => '$2y$10$dtiyvr3Al4u7S92sJwX16.AX2gC20Pz.NCFA6ld4rD0DR7leVAQsm',
                    'tipo' => 0,
                ]
            );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

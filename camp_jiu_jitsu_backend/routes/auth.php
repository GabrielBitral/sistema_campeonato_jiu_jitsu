<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CampeonatoController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::controller(AuthenticatedSessionController::class)
        ->group(function () {
            Route::get('login', 'create')->name('login');
            Route::post('login', 'store')->name('login');

            Route::get('login_painel', 'createPainel')->name('login_painel');
            Route::post('login_painel', 'store')->name('login_painel');
        });
});

Route::controller(CampeonatoController::class)
    ->group(function () {
        Route::get('/', 'buscarCampeonatosSite')->name('/');
        Route::get('torneios', 'buscarTodosCampeonatosAtivos')->name('torneios');
    });

Route::middleware('authpaineladmin')->group(function () {
    Route::controller(CampeonatoController::class)
        ->group(function () {
            Route::post('cadastrar_campeonato', 'cadastrar')->name('cadastrar_campeonato');

            Route::post('cadastrar_imagem',  'salvarImagem')->name('cadastrar_imagem');

            Route::get('campeonatos_painel', 'buscarCampeonatosPainel')->name('campeonatos_painel');

            Route::post('destacar',  'destacarOuTirarDestaque')->name('destacar');
        });
    Route::get('cadastrar_campeonato', function () {
        $response = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome');
        $estados = $response->json();
        return view('painel.cadastrar_campeonato')->with('estados', $estados)->with('mensagemSucesso');
    });
    Route::get('painel', function () {
        return view('painel.index');
    })->name('painel');
});

Route::middleware('authpainelusuario')->group(function () {
    Route::controller(CampeonatoController::class)
        ->group(function () {
            Route::get('campeonatos_painel', 'buscarCampeonatosPainel')->name('campeonatos_painel');
        });
});

Route::middleware('auth')->group(function () {

    Route::controller(AuthenticatedSessionController::class)
        ->group(function () {
            Route::post('logout', 'destroy')->name('logout');
            Route::post('logout_painel', 'destroyPainel')->name('logout_painel');
        });
});

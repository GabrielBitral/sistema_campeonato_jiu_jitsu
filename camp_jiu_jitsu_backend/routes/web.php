<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('index');
});

Route::get('integra', function () {
    return view('site.integra');
});

Route::get('inscricao', function () {
    return view('site.inscricao');
});

Route::get('chave_listagem', function () {
    return view('site.chave_listagem');
});

Route::get('resultados', function () {
    return view('site.resultados');
});

Route::get('chave_integra', function () {
    return view('site.chave_integra');
});

Route::get('esqueci_senha', function () {
    return view('auth.esqueci_senha');
});

Route::get('esqueci_senha_enviado', function () {
    return view('auth.esqueci_senha_enviado');
});

Route::get('recuperar_senha', function () {
    return view('auth.recuperar_senha');
});

Route::middleware('auth')->group(function () {
    Route::get('area_restrita', function () {
        return view('area_atleta.area_restrita');
    })->name('area_restrita');

    Route::get('certificado_participacao', function () {
        return view('area_atleta.certificado_participacao');
    });

    Route::get('certificado_vitoria', function () {
        return view('area_atleta.certificado_vitoria');
    });
});

Route::get('cadastrar', function () {
    return view('painel.cadastrar');
});

Route::get('editar', function () {
    return view('painel.editar');
});

Route::get('recuperar_senha_painel', function () {
    return view('painel.recuperar_senha');
});

require __DIR__ . '/auth.php';

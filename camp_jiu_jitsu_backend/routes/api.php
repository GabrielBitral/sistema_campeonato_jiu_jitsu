<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cidades', function (Request $request) {
    $idEstado = $request->id;
    $response = Http::get("https://servicodados.ibge.gov.br/api/v1/localidades/estados/$idEstado/municipios");
    $estados = $response->json();

    return response()->json($estados);
})->name('cidades');

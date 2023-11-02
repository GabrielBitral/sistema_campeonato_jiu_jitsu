<?php

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

Route::get('torneios', function () {
    return view('torneios');
});

Route::get('area_restrita', function () {
    return view('area_atleta.area_restrita');
});

require __DIR__.'/auth.php';

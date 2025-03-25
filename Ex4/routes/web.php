<?php

use App\Http\Controllers\IMCController;
use App\Http\Controllers\SonoController;
use App\Http\Controllers\ViagemController;

Route::get('/', function () {
    return view('index');
})->name('home');

// IMC
Route::get('/imc', [IMCController::class, 'form'])->name('imc.form');
Route::post('/imc', [IMCController::class, 'calcular'])->name('imc.calc');

// Sono
Route::get('/sono', [SonoController::class, 'form'])->name('sono.form');
Route::post('/sono', [SonoController::class, 'avaliar'])->name('sono.eval');

// Viagem
Route::get('/viagem', [ViagemController::class, 'form'])->name('viagem.form');
Route::get('/gasto', [ViagemController::class, 'calcular'])->name('viagem.calc');

<?php

use App\Http\Controllers\CepController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//retorna a view do form
Route::get('/cep', [CepController::class, 'index'])
    ->name('cep.index');

//retorna a msm view porém com dados
Route::post('/cep', [CepController::class, 'consultar'])
    ->name('cep.consultar');    


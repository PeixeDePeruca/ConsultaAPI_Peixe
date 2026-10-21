<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExternalApiController;
use App\Http\Controllers\PeixeController;

// Rota do Consumo da API Externa (Requisito 1)
Route::get('/externa', [ExternalApiController::class, 'index']);

// Rotas RESTful da sua API (Requisito 2)
Route::apiResource('peixes', PeixeController::class);
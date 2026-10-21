<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExternalApiController extends Controller
{
    public function index()
    {
        // Consumindo a API pública do PokeAPI
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/ditto');

        return response()->json($response->json());
    }
}
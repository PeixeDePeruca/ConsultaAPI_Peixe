<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExternalApiController extends Controller
{
    public function index()
    {
        // desativa a verificação SSL local para permitir a conexão cURL
        $response = Http::withoutVerifying()->get('https://pokeapi.co/api/v2/pokemon/ditto');

        return response()->json($response->json());
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultarCepRequest;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function index()
    {
        return view('cep.index');

    }


    public function consultar(ConsultarCepRequest $request)
    {
        $cep = $request->validated('cep');

        $resposta = Http::timeout(5)
        ->withoutVerifying()->get("https://viacep.com.br/ws/{$cep}/json");
        

            
        $dados = $resposta->json();

        return view('cep.index', ['endereco' => $dados]);

    }

}

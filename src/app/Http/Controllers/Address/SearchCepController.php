<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Inertia\Inertia;

class SearchCepController extends Controller
{
    public function search(Request $request)
    {
        // Validação básica do CEP
        $request->validate([
            'cep' => 'required|regex:/^\d{5}-\d{3}$/'
        ]);

        $cep = str_replace('-', '', $request->input('cep'));

        // Cria uma instância do GuzzleHttp\Client
        $client = new Client();

        // Faz a requisição para o serviço do ViaCEP
        $response = $client->get("https://viacep.com.br/ws/{$cep}/json/");

        // Verifica se a requisição foi bem sucedida
        if ($response->getStatusCode() === 200) {
            // Converte a resposta JSON para um array associativo
            $data = json_decode($response->getBody(), true);

            // Retorna os dados em formato JSON
            return Inertia::render('Welcome', ['data' => $data]);
        } else {
            // Retorna uma resposta de erro em JSON
            return Inertia::render('Welcome', ['error' => 'Erro ao consultar o serviço ViaCEP']);
        }
    }
}

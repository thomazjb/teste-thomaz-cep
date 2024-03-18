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

        $request->validate([
            'cep' => 'required|regex:/^\d{5}-\d{3}$/'
        ]);

        $cep = str_replace('-', '', $request->input('cep'));
        $client = new Client();
        $response = $client->get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->getStatusCode() === 200) {

            $data = json_decode($response->getBody(), true);
            return Inertia::render('Welcome', ['data' => $data]);
        } else {

            return Inertia::render('Welcome', ['error' => 'Erro ao consultar o serviço ViaCEP']);
        }
    }
}

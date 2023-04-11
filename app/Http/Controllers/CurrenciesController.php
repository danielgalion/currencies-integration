<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class CurrenciesController extends Controller {
    
    private ?array $currencies; 
    
    public function index() {
        $this->integrateFromNBP();

        return view('currencies', ['currencies' => $this->currencies ?? array()]);
    }

    private function integrateFromNBP() {
        $response = Http::get('https://api.nbp.pl/api/exchangerates/tables/a?format=json');

        $json = $response->json();

        $this->currencies = $json[0]['rates'];
    }
}
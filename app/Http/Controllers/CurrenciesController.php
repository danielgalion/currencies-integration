<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CurrenciesController extends Controller {
    
    private ?array $currencies; 
    
    public function index() {
        $this->integrateFromNBP();
        $this->updateDB();

        return view('currencies', ['currencies' => $this->getCurrencies()]);
    }

    private function integrateFromNBP() {
        try {
            $response = Http::get('https://api.nbp.pl/api/exchangerates/tables/a?format=json');
            echo "API integration's status: " . $response->status();
        } catch (ConnectionException $e) {
            echo $e->getMessage();

            return;
        }

        $json = $response->json();

        $this->currencies = $json[0]['rates'];
    }

    private function updateDB() {
        foreach($this->currencies ?? array() as $currency) {
            DB::table('currencies')->updateOrInsert(
                ['name' => $currency['currency'], 'currency_code' => $currency['code']],
                ['exchange_rate' => $currency['mid']]
            );
        }
    }

    private function getCurrencies() {
        return Currency::all();
    }
}
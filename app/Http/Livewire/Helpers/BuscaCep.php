<?php

namespace App\Http\Livewire\Helpers;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
class BuscaCep extends Component
{   


    public function buscaCep($cep){
        
        $response = Http::get('https://api.postmon.com.br/v1/cep/'.$cep);
        $dados = $response->json();

        return $dados;
    }
    public function render()
    {
        return view('livewire.helpers.busca-cep');
    }
}

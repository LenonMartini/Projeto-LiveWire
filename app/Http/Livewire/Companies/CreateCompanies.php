<?php

namespace App\Http\Livewire\Companies;

use Livewire\Component;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Livewire\Helpers\BuscaCep;

use App\Models\Company;

class CreateCompanies extends Component
{   

    public $social_reason;
    public $abbreviated;
    public $cnpj;
    public $fone;
    public $ie;
    public $im;
    public $email;
    public $logo;
    public $status = 1;
    public $cep;
    public $andress;
    public $number;
    public $district;
    public $city;
    public $state;
    public $uf;
    
   

    protected $rules = [
        'social_reason' => 'required',
        'abbreviated' => 'required',
        'cnpj' => 'required|unique:companies,cnpj',
        'email' => 'required|email|unique:companies,email',
       

    ];


    public function store(){

       $this->validate();

        $company = Company::create([
            'social_reason' => $this->social_reason,
            'abbreviated'   => $this->abbreviated,
            'cnpj'          => $this->cnpj,
            'fone'          => $this->fone,
            'ie'            => $this->ie,
            'im'            => $this->im,
            'email'         => $this->email,
            'logo'          => $this->logo,
            'status'        => $this->status,
            'cep'           => $this->cep,
            'andress'       => $this->andress,
            'number'        => $this->number,
            'district'      => $this->district,
            'city'          => $this->city,
            'state'         => $this->state,
            'uf'            => $this->uf,
        ]);
        
        if($company){

            session()->flash('message', 'Registro inserido com sucesso!!!');
            return redirect()->to('/portal/companies');
          
        }else{

            session()->flash('error', 'Registro problema ao inserir registro!!!');
            return redirect()->to('/portal/companies');

        }
   
        

    }

    public function buscaCep(){
        
        if($this->cep){
            $buscaCep = New buscaCep();
            $dados = $buscaCep->buscaCep($this->cep);

            if($dados){

                $this->district = $dados['bairro'];
                $this->city = $dados['cidade'];
                $this->state = $dados['estado_info']['nome'];
                $this->uf = $dados['estado'];

            }else{
                
                session()->flash('error', 'Cep não encontrado');
            }

        }else{
            session()->flash('error', 'Cep não enviado');
        }


       /* $response = Http::get('https://api.postmon.com.br/v1/cep/'.$this->cep);
        $dados = $response->json();
        if($dados){
           
          

            $this->district = $dados['bairro'];
            $this->city = $dados['cidade'];
            $this->state = $dados['estado_info']['nome'];
            $this->uf = $dados['estado'];
        }else{

           session()->flash('error', 'Cep não encontrado');
           
        }       */
    }

    public function render()
    {
        return view('livewire.companies.create-companies');
    }
}

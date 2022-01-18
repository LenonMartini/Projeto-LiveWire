<?php

namespace App\Http\Livewire\Companies;

use Livewire\Component;
use App\Models\Company;

use Illuminate\Support\Facades\Http;
use App\Http\Livewire\Helpers\BuscaCep;


class EditCompanies extends Component
{   
    public $codigo;
    public $social_reason;
    public $abbreviated;
    public $cnpj;
    public $fone;
    public $ie;
    public $im;
    public $email;
    public $logo;
    /*public $status;*/
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


    public function mount($codigo){

       if($codigo){
           $company = Company::find($this->codigo);
           if($company){
                $this->codigo = $codigo;
                $this->social_reason = $company->social_reason;
                $this->abbreviated = $company->abbreviated;
                $this->cnpj = $company->cnpj;
                $this->fone = $company->fone;
                $this->ie = $company->ie;
                $this->im = $company->im;
                $this->email = $company->email;
                $this->status = $company->status;
                $this->cep = $company->cep;
                $this->andress = $company->andress;
                $this->number = $company->number;
                $this->district = $company->district;
                $this->city = $company->city;
                $this->state = $company->state;
                $this->uf = $company->uf;
           }
          


       }
    }


    public function render(){

        /*if($this->codigo){


            $company = Company::find($this->codigo);


            if($company){


                $this->social_reason = $company->social_reason;
                $this->abbreviated = $company->abbreviated;
                $this->cnpj = $company->cnpj;
                $this->fone = $company->fone;
                $this->ie = $company->ie;
                $this->im = $company->im;
                $this->email = $company->email;
                $this->status = $company->status;
                $this->cep = $company->cep;
                $this->andress = $company->andress;
                $this->number = $company->number;
                $this->district = $company->district;
                $this->city = $company->city;
                $this->state = $company->state;
                $this->uf = $company->uf;




            }else{
                session()->flash('error', 'Registro não encontrado!!!');
                return redirect()->to('/companies'); 
            }




            return view('livewire.companies.edit-companies', [
                'company' => $company
            ]);

        }else{


            session()->flash('error', 'Contate o Administrador!!!');
            return redirect()->to('/companies');
        }
            */

        return view('livewire.companies.edit-companies');
    }

    public function update(){
        $company = Company::find($this->codigo);

      
        if($company){

            $this->validate();    
            

            if($company->cnpj != $this->cnpj){
                $hasCnpj = Company::where('cnpj', $this->cnpj)->get();
                if(count($hasCnpj) === 0){
                    $this->cnpj = $this->cnpj;
                }
            }
            if($company->email != $this->email){
                $hasEmail = Company::where('email', $this->email)->get();
                if(count($hasEmail) === 0){
                    $this->email = $this->email;
                }
            }

           

            $company = Company::update([
                'social_reason' => $this->social_reason,
                'abbreviated'   => $this->abbreviated,
                'cnpj'          => $this->cnpj,
                'fone'          => $this->fone,
                'ie'            => $this->ie,
                'im'            => $this->im,
                'email'         => $this->email,
                'logo'          => $this->logo,
                
                'cep'           => $this->cep,
                'andress'       => $this->andress,
                'number'        => $this->number,
                'district'      => $this->district,
                'city'          => $this->city,
                'state'         => $this->state,
                'uf'            => $this->uf,
            ]);
            
            if($company){

                session()->flash('message', 'Registro atualizado com sucesso!!!');
                return redirect()->to('/portal/companies');
            
            }else{

                session()->flash('error', 'Problema ao atualizar registro!!!');
                return redirect()->to('/portal/companies');

            }
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


     
    }
}

<?php

namespace App\Http\Livewire\Companies;

use Livewire\Component;
use App\Models\Company;

class HomeCompanies extends Component
{   
    public $codigo;
    public $social_reason;
    public $cnpj;
    
  
   
  

    public function render(){    

               

        $userLogged = auth()->user()->name;     
        $query = Company::query();
        
        if($this->codigo){
             $query->where('id', $this->codigo);           
        }
        if($this->social_reason){
            $query->where('social_reason', 'LIKE', '%' . $this->social_reason . '%');
        }
        if($this->cnpj){
            $query->where('cnpj', 'LIKE', $this->cnpj);
        }  
        
       
       
        $lista = $query->paginate(8);    

       
        
       
        return view('livewire.companies.home-companies', [
            'lista' => $lista
           
           
        ]);

    }

   

    public function destroy($codigo){

        $company = Company::find($codigo);

        if($company->delete()){
           
            session()->flash('message', 'Registro deletado com sucesso!!!');
           /* return redirect()->to('/portal/companies');*/

        }else{

            session()->flash('erro', 'Erro: não foi possivel deletar registro!!!');
            /*return redirect()->to('/portal/companies');*/
        }



    }



    public function setStatus($codigo){
        
        $company = Company::find($codigo);

        if($company->status === 1){

            $company->status = 0;
            $company->update();

            session()->flash('message', 'Registro atualizado com sucesso!!!');
            /* return redirect()->to('/portal/companies');*/

        }else{

            $company->status = 1;
            $company->update();

            session()->flash('message', 'Registro atualizado com sucesso!!!');
        }
        
        

    }

    
    

    
}

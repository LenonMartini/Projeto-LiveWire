<?php

namespace App\Http\Livewire\Companies;

use Livewire\Component;
use App\Models\Company;

class ShowCompanies extends Component
{   
    public $codigo;

    public function mount($codigo){
        $this->codigo = $codigo;
    }

    public function render(){
        
        
        if($this->codigo){

            $company = Company::find($this->codigo);

            



            return view('livewire.companies.show-companies', [
                'company' => $company
            ]);
        }else{

            session()->flash('error', 'Registro não encontrado');
            return redirect()->to('/portal/companies');
        }



        
    }
}

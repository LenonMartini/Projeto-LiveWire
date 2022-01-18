<div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <h4>Empresas</h4>
            </div>    
            <hr class="border border-secondary"/>  
        </div> 
        <div wire:loading wire:target="store" style="width: 100%">
            <div class="alert alert-info">
                                
                    <div class="spinner-border text-info" role="status">
                        <span class="sr-only"></span>
                    </div>
                    Processando as Informações Aguarde...
               
                        
            </div>
        </div>
          
        <div class="row">
            <div class="col-md-12">
               
                <div class="card shadow">
                    <div class="card-header ">
                        <h5><b>Cadastro de Empresa</b></h5>  
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="store" method="POST">
                            <div class="form-group">
                                <fieldset class="border  p-3">
                                    <legend>Informações de Empresa</legend>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Razão Social</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="social_reason"  name="social_reason" placeholder="Informe a Razão Social" autocomplete="off">
                                            <div class="text-danger">
                                                @error('social_reason')
                                                    <b>{{$message}}</b>
                                                @enderror
                                            </div>
                                        </div>  
                                        <div class="col-sm-12">
                                            <label>Abreviatura</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="abbreviated" name="abbreviated" placeholder="Informe o Nome Abreviado" autocomplete="off">
                                            <div class="text-danger">
                                                @error('abbreviated')
                                                    <b>{{$message}}</b>
                                                @enderror
                                            </div>
                                        </div>    
                                        <div class="col-sm-3">
                                            <label>Cnpj</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="cnpj" id="cnpj" name="cnpj" placeholder="" autocomplete="off">
                                            <div class="text-danger">
                                                @error('cnpj')
                                                    <b>{{$message}}</b>
                                                @enderror
                                            </div>
                                        </div>    
                                        <div class="col-sm-3">
                                            <label>Telefone</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="fone" id="fone" name="fone" placeholder="" autocomplete="off">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Inscrição Estadual</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="ie" name="ie" placeholder="" autocomplete="off">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Iscrição Municipal</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="im" name="im" placeholder="" autocomplete="off">
                                        </div>
                                        <div class="col-sm-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control form-control-sm" wire:model="email" name="email" placeholder="" autocomplete="off">
                                            <div class="text-danger">
                                                @error('email')
                                                    <b>{{$message}}</b>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                    </div>    
                                </fieldset>                               
                              
                                <fieldset class="border p-3 mt-2">
                                    <legend>Informações de Endereço</legend>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            
                                            @if (session()->has('error'))
                                               
                                                <label class="text-danger"><b>{{ session('error') }}</b></label>    
                                                
                                            @else  
                                                <label>CEP</label>  
                                            @endif                                            
                                            <input type="text" class="form-control form-control-sm" wire:change="buscaCep" wire:model="cep"  id="cep" name="cep" placeholder="" autocomplete="off">
                                           
                                        </div>  
                                        <div class="col-sm-8">
                                            <label>Logradouro</label>
                                            <input type="text" class="form-control form-control-sm"  wire:model="andress" id="andress" name="andress" placeholder="" autocomplete="off">
                                        </div>    
                                        <div class="col-sm-1">
                                            <label>Numero</label>
                                            <input type="text" class="form-control form-control-sm"  wire:model="number"  name="number" placeholder="" autocomplete="off">
                                        </div>    
                                        <div class="col-sm-3">
                                            <label>Bairro</label>
                                            <input type="text" class="form-control form-control-sm"  wire:model="district" id="district" name="district" placeholder="" autocomplete="off">
                                        </div>
                                        <div class="col-sm-5">
                                            <label>Cidade</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="city" id="city" name="city" placeholder="" autocomplete="off">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>Estado</label>
                                            <input type="text" class="form-control form-control-sm" wire:model="state" id="state" name="state" placeholder="" autocomplete="off">
                                        </div>
                                        <div class="col-sm-1">
                                            <label>UF</label>
                                            <input type="teste" class="form-control form-control-sm" wire:model="uf" id="uf" name="uf" placeholder="" autocomplete="off">
                                        </div>
                                    
                                    </div>    
                                </fieldset>
                                <div class="row mt-4">
                                    <div class="col-sm-12 d-flex justify-content-center">
                                        <button class="btn btn-outline-dark">
                                            <i class="fas fa-save"></i> Salvar
                                        </button>
                                    </div>
                                </div>        
                            </div>
                         
                        </form> 
                       
                    </div>    
                </div>    
            
            </div>   
        
        </div>
    
    </div>
</div>   


@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    var cep = document.getElementById('cep');
    var cnpj = document.getElementById('cnpj');
    var fone = document.getElementById('fone');
    let cepMask = IMask(cep, {
        mask: '00000-000',
        lazy: false,  // make placeholder always visible
        placeholderChar: '0'     // defaults to '_'
    });


    let cnpjMask = IMask(cnpj, {
        mask: '00.000.000/0000-00',
        lazy: false,  // make placeholder always visible
        placeholderChar: '0'     // defaults to '_'
    });


    let foneMask = IMask(fone, {
        mask: '(00) 0000-0000',
        lazy: false,  // make placeholder always visible
        placeholderChar: '0'     // defaults to '_'
    });

</script>

@endpush
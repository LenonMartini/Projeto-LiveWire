<div class="container mt-3">
    <h4>Empresas</h4>
    <hr class="border border-secondary"/>  

    <div class="row mb-2">
        <div class="col-sm-12">
            @include('includes.mensage')
        </div>
        <div class="col-sm-12">
            @include('includes.loading')
        </div>
    </div>

    <div wire:loading wire:target="render" style="width: 100%">
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
                    <div class="card-header">
                       
                            <div class="row">
                                <div class="col-sm-12">
                                   
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <label>Código</label>
                                                <input class="form-control form-control-sm" name="id" id="codigo" wire:model.defer="codigo" autocomplete="off" />
                                            </div>
                                            <div class="col-sm-5">
                                                <label>Empresa</label>
                                                <input class="form-control form-control-sm" name="social_reason" id="social_reason" wire:model.defer="social_reason" placeholder="Digite aqui..." autocomplete="off" />
                                            </div>
                                            <div class="col-sm-3">
                                                <label>CNPJ</label>
                                                <input type="text" class="form-control form-control-sm" id="cnpj" wire:model.defer="cnpj" id="cnpj" name="cnpj" placeholder="" autocomplete="off">
                                            </div>
                                            <div class="col-sm-3 text-center">
                                              
                                                <button class="btn btn-sm btn-outline-dark" wire:click="render"  style="margin-top:25px">
                                                    <i class="fas fa-search"></i> Filtrar
                                                </button>
                                              
                                            </div>
                                        </div>
                                    
                                    </div>
                                   
                                </div>
                                
                            </div>    
                       
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <a href="/portal/companies/create">
                                    <button class="btn btn-sm btn-outline-primary" wire:click="loading"><i class="fa fa-sun" aria-hidden="true"></i>
                                        Criar Registro
                                    </button>
                                </a>    
                            </div>
                        </div>                             
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="table table-dark">
                                    <tr>
                                        <th class="text-center">Codigo</th>
                                        <th>Empresa</th>
                                        <th class="text-center">Cnpj</th>
                                        <th class="text-center">Fone</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Ações</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lista as $item)
                                        <tr>
                                            <td class="text-center">{{$item->id}}</td>
                                            <td>{{$item->social_reason}}</td>
                                            <td class="text-center">{{$item->cnpj}}</td>
                                            <td class="text-center">{{$item->fone}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm"  title="{{$item->status == 1 ? 'Desativar' : 'Ativar'}}" wire:click.prevent="setStatus({{$item->id}})">
                                                    <i class="{{$item->status == 1 ? 'fas fa-check text-success' : 'fas fa-times text-danger'}}"></i>
                                               
                                                </button>
                                                    <!--<i class="fas fa-times text-danger"></i>-->
                                               
                                            </td>
                                            <td class="text-center">
                                                <a title="Visualizar" href="/portal/companies/show/{{$item->id}}" wire:click="loading" class="btn btn-sm">
                                                    <i class="fas fa-eye text-info"></i> 
                                                </a>
                                                <a title="Editar" href="/portal/companies/{{$item->id}}/edit" wire:click="loading" class="btn btn-sm">
                                                    <i class="fas fa-edit "></i> 
                                                </a>
                                                <button title="deletar" 
                                                        onclick="confirm('Deseja deletar esse registro?') 
                                                        || event.stopImmediatePropagation()" 
                                                        wire:click.prevent="destroy({{$item->id}})" 
                                                        class="btn btn-sm ">
                                                        <i class="fas fa-trash text-danger"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div>
                                                    
                            {{ $lista->links() }}
                        </div>
                    </div>   
                </div>

        </div>
    </div>   
</div>

@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>
   
    var cnpj = document.getElementById('cnpj');
    let cnpjMask = IMask(cnpj, {
        mask: '00.000.000/0000-00',
        lazy: false,  // make placeholder always visible
        placeholderChar: '0'     // defaults to '_'
    });

    
</script>


@endpush

<div class="container mt-3">
    <h4>Empresas: {{$company->social_reason}}</h4>
    <hr class="border border-secondary"/>  

    <div class="row mb-2">
        <div class="col-sm-12">
           @include('includes.mensage')
        </div>
        <div class="col-sm-12">
           @include('includes.loading')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <fieldset class="border p-3 ">
                        <legend>Informações de Empresa</legend>
                            <div class="row">
                                <div class="col-sm-12">
                                    <b>Razão Social: </b>{{$company->social_reason}}
                                </div>
                                <div class="col-sm-12">
                                    <b>Abreviatura: </b>{{$company->abbreviated}}
                                </div>
                                <div class="col-sm-12">
                                    <b>Cnpj: </b>{{$company->cnpj}}
                                </div>
                                <div class="col-sm-12">
                                    <b>Telefone: </b>{{$company->fone}}
                                </div>
                                <div class="col-sm-12">
                                    <b>Inscrição Estadual: </b>{{$company->ie}}
                                </div>
                                <div class="col-sm-12">
                                    <b>Inscrição Municipal: </b>{{$company->im}}
                                </div>
                                <div class="col-sm-12">
                                    <b>Status: </b>{{$company->status}}
                                </div>
                                <div class="col-sm-12">
                                    <b>Razão Social: </b>{{$company->social_reason}}
                                </div>
                            </div>
                    </fieldset>
                    <fieldset class="border p-3 mt-3">
                        <legend>Informações de Endereço</legend>
                            <div class="row">
                                <div class="col-sm-12">
                                    <b>Cep: </b>{{$company->cep}}
                                </div>
                                <div class="col-sm-12">
                                    <b>Logradouro: </b>{{$company->andress}}
                                </div>
                                <div class="col-sm-12">
                                    <b>Numero: </b>{{$company->number}}
                                </div>
                                <div class="col-sm-12">
                                    <b>Bairro: </b>{{$company->district}}
                                </div>
                                <div class="col-sm-12">
                                    <b>Cidade: </b>{{$company->city}}
                                </div>
                                <div class="col-sm-12">
                                    <b>Estado: </b>{{$company->state}}
                                </div>
                                <div class="col-sm-12">
                                    <b>Uf: </b>{{$company->uf}}
                                </div>
                               
                            </div>
                    </fieldset>   
                    
                    <div class="row mt-3">
                        <div class="col-sm-12 text-center">
                            <a title="Voltar" href="/portal/companies" wire:click="loading" class="btn btn-sm btn-outline-primary   ">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


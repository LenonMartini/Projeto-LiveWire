<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>DR-HOSP</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
       
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        
        @livewireStyles

        <!-- Scripts -->
        
    </head>
    <body style="background-color: rgb(254, 252, 252)">
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3">
                <div class="container">
                    <a class="navbar-brand" href="{{route('portal.index')}}">DR-HOSP</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
          
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cadastros
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('companies.index')}}">
                                        <i class="fa fa-building" aria-hidden="true"></i>
                                        Empresas
                                    </a>
                                    <a class="dropdown-item" href="/users">
                                        <i class="fa fa-users" aria-hidden="true"></i> Usuarios
                                    </a>
                                   
                                </div>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                           
                                                     
                        </ul>
                       
                
                    </div>
                    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li class="nav-item dropdown" style="list-style: none;">
                            <a class="nav-link dropdown-toggle text-dark"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>        
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    <i class="fa fa-power-off"></i> Sair

                                </a>
                            </div>
                        </li>
                    </form> 
                </div>    
          </nav>

        <main>
            {{$slot}}
        </main>
        

        @livewireScripts

        
       
        <script src="{{ asset('js/app.js') }}"></script>  
        <script src="{{ asset('assets/js/jquery-3.2.1.slim.min.js')}}"></script>
        <script src="{{ asset('assets/js/popper.min.js')}}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('assets/js/fontawesome.js')}}"></script>
      
    
             
        @stack('scripts')
    </body>
</html>

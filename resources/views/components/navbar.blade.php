{{--  
    <nav class="navbar bg-white py-3 navbar-expand-lg navcustm justify-content-center">
        <div class="container-fluid">
            <a class="navbar-brand rainbow-text" href="{{ route('home') }}">Fumettisti Indie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    @auth
                    
                    
                    <li class="nav-item mx-2 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Aggiungi Fumetto
                        </a>
                        <ul class="dropdown-menu m-2">
                            <li><a class="btn btn-primary border  my-1 d-block" href="{{route('article.create')}}">Aggiungi Articolo</a></li>
                            
                            <li><a class="btn btn-primary border my-1 d-block" href="{{route('article.index','id')}}">Mostra Articolo</a></li> 
                            
                        </ul>
                    </li>
                    @endauth
                    
                    
                    <li class="nav-item mx-2 dropdown">
                        <a class="nav-link dropdown-toggle ms-auto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ciao {{ Auth::user()->name ?? 'Utente' }}
                        </a>
                        
                        
                        
                        <ul class="dropdown-menu">
                            @guest
                            <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
                            <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                            @else
                            <li class="dropdown-item">
                                
                                <a href="{{route('profile.edit','id')}}" class="btn btn-primary">Modifica Profilo</a>
                                <a href="{{route('profile.show','id')}}" class="btn btn-primary">Mostra Profilo</a>
                                <form class="p-2" method="POST" action=""></form>
                                <form class="p-2" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">Logout</button>
                                </form>
                            </li>
                            @endguest
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    --}}
    @csrf
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <!-- Nome del sito a sinistra -->
            <a class="navbar-brand ms-3 nava" href="{{ route('home') }}">Fumettisti indipendenti</a>
            <!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                Aggiunta la classe ms-3 per spostare il nome del sito completamente a sinistra -->
                
                <!-- Toggler per il menu responsivo -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Elementi della navbar -->
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <!-- Voci della navbar a sinistra (vuote nel tuo caso) -->
                        
                    </ul>
                    
                    <!-- Voci centrali della navbar -->
                    <ul class="navbar-nav centernav mx-auto" style="margin-left: auto; margin-right: auto;">
                        <li class="nav-item">
                            <a class="nav-link nava" href="#">Cerca Fumetti Da sistemare</a>
                        </li>
                    </ul>
                    
                    
                    {{--! Dropdown a destra  --}}
                    <ul class="navbar-nav me-5">
                        <li class="nav-item dropdown">
                            
                            <a class="nav-link dropdown-toggle nava" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account di {{ Auth::user()->name ?? 'Ospite' }}
                            </a>
                            
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @auth
                                    
                                
                                
                                
                                <li><a class="dropdown-item " href="{{route('profile.show', 'id')}}">Profilo</a></li>
                                <li><a class="dropdown-item" href="{{route('profile.edit', 'id')}}">Impostazioni</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <form class="" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>

                                @else
                                <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>

                                @endauth
                                

                                
                                
                                {{-- <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li> --}}
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        
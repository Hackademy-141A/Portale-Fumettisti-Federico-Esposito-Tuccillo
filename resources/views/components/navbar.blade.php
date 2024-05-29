
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
                        <a class="nav-link nava" href="{{route('profile.fumettisti')}}">Fumettisti</a>
                        {{--  --}}
                    </li>
                </ul>
                
                
                {{--! Dropdown a destra  --}}
                <ul class="navbar-nav me-5 ">
                    <li class="nav-item dropdown">
                        
                        
                        
                        
                        <a class="nav-link dropdown-toggle nava" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Benvenuto {{ Auth::user()->name ?? 'Ospite' }}
                            
                            
                        </a>
                        
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @auth
                            
                            
                            
                            
                            <li><a class="dropdown-item " href="{{route('article.create')}}">Aggiungi Fumetto</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('article.byUser', Auth::user()->id)}}">I Tuoi Fumetti</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('profile.edit', Auth::user()->id)}}">Profilo</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <form class="text-center" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-danger" type="submit">Disconnect</button>
                            </form>
                            
                            @else
                            <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                            {{-- <li><hr class="dropdown-divider"></li> --}}
                            
                            <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                            
                            @endauth
                            
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    
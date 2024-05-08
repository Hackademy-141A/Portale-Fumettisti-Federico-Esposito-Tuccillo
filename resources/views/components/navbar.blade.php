<nav class="navbar bg-white py-3 navbar-expand-lg bgcustm justify-content-space-center">
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
                        {{-- ! Da spostare --}}
                    </ul>
                </li>
                @endauth
                {{--!Ciao utente --}}
                <li class="nav-item mx-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ciao {{ Auth::user()->name ?? 'Utente' }}
                    </a>
                    
                    
                    {{-- !DropDown --}}
                    <ul class="dropdown-menu">
                        @guest
                        <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
                        <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                        @else
                        <li class="dropdown-item">
                            {{-- <a href="{{ route('profile.show', Auth::id(''))}}" class="btn btn-primary">Mostra Profilo</a> --}}
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

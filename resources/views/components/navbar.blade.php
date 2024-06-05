<!DOCTYPE html>
<html lang="en">
<head>
    @csrf
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Customization</title>
    <style>
        /* Navbar Styles */
        .navbar {
            background-color: #aea0ff !important;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            font-family: 'Pacifico', cursive!important;
            font-size: 30px;
        }
        
        .navbar-brand {
            font-size: 30px;
            color: #ffffff !important;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            transition: color 0.3s;
        }
        
        .navbar-brand:hover {
            color: #ffcc00 !important;
        }
        
        .navbar-nav .nav-link {
            color: #ffffff !important;
            margin: 0 10px;
            transition: color 0.3s;
        }
        
        .navbar-nav .nav-link:hover {
            color: #ffcc00 !important;
        }
        
        .dropdown-menu {
            border-radius: 5px;
        }
        
        .dropdown-item {
            color: grey !important;
            transition: color 0.3s;
        }
        
        .dropdown-item:hover {
            color: #555 !important;
            background-color: transparent !important;
        }
        
        .dropdown-divider {
            border-top: 1px solid #444;
        }
        
        .btn-danger {
            background-color: #d9534f;
            border-color: #d43f3a;
        }
        
        .btn-danger:hover {
            background-color: #c9302c;
            border-color: #ac2925;
        }
        
        .navbar-toggler {
            border: none;
        }
        
        
    </style>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="{{ route('home') }}">Fumettisti indipendenti</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                {{-- <span class="navbar-toggler-icon"></span> --}}
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <!-- Placeholder for left-side links if needed in the future -->
                </ul>
                <ul class="navbar-nav centernav mx-auto">
                    <li class="nav-item">
                        <!-- Placeholder for central links -->
                        <a class="nav-link nava" href="{{route('profile.fumettisti')}}">Fumettisti</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Benvenuto {{ Auth::user()->name ?? 'Utente' }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @auth
                            <li><a class="dropdown-item" href="{{route('article.create')}}">Aggiungi Fumetto</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('article.byUser', Auth::user()->id)}}">I Tuoi Fumetti</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('profile.edit', Auth::user()->id)}}">Impostazioni</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form class="text-center" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Logout!</button>
                                </form>
                            </li>
                            @else
                            <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                            <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Bootstrap JS and dependencies -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script> --}}
</body>
</html>

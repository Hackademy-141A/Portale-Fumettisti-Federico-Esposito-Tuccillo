<!-- resources/views/auth/register.blade.php -->

<x-layout>
    <link rel="stylesheet" href="{{ asset('css/createprofile.css') }}">
    
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
            <li class="">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <body>
        
        
        <div class="container register-page">
            <div class="form-box">
                <form class="form " action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <span class="title">Registrati</span>
                    <span class="subtitle">Crea un account gratis con la tua email.</span>
                    
                    <div class="form-container">
                        <input type="text" class="input" placeholder="Username" name="username" id="username" value="{{ old('username') }}">
                        <input type="text" class="input" placeholder="Nome" name="name" id="name" value="{{ old('name') }}">
                        <input type="email" class="input" placeholder="Email" name="email" id="email" value="{{ old('email') }}">
                        <input type="password" class="input" placeholder="Password" name="password" id="password">
                        <input type="password" class="input" placeholder="Conferma Password" name="password_confirmation" id="password_confirmation">
                        <input type="text" class="input" placeholder="Numero di Telefono" name="phone" id="phone" value="{{ old('phone') }}">
                        <input type="text" class="input" placeholder="Indirizzo Compagnia" name="company_address" id="company_address" value="{{ old('company_address') }}">
                        <input type="text" class="input" placeholder="Breve Descrizione" name="short_description" id="short_description" value="{{ old('short_description') }}">
                    </div>
                    
                    {{-- <div class="form-container">
                        <label for="image" class="form-label">Immagine Profilo:</label>
                        <input type="file" name="image" id="image" class="input" accept="image/jpg,image/jpeg,image/png">
                        <img id="profile-image-preview" class="profile-image-preview" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png" alt="Immagine utente">
                    </div> --}}
                    
                    <button class="mb-4 mt-4" type="submit">Registrati</button>
                </form>
                
                <div class="form-section">
                    <p>Hai già un account? <a href="{{ route('login') }}">Accedi</a></p>
                </div>
            </div>
        </div>
    </body>
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                document.getElementById('profile-image-preview').src = URL.createObjectURL(file);
            }
        });
    </script>
</x-layout>

<x-layout style="/css/edit-profile.css">
    @auth
        
    <link rel="stylesheet" href="{{ asset('css/edit-profile.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    
    <body>
        
        <div class="container-xl px-4 mt-4">
            @if (session('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
            @endif
            <h3 class="text-center">Ciao {{$user->name}} qui potrai modificare i tuoi dati personali:</h3>
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="#" target="__blank">Profilo</a>
                <a class="nav-link" href="{{ route('profile.editPassword', 'id') }}" target="__blank">Sicurezza</a>
                <a class="nav-link" href="#" target="__blank"></a>
                <a class="nav-link" href="#" target="__blank"></a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Immagine Profilo:</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        @if ($user->image)
                        <img class="img-account-profile rounded-circle mb-4" id="profile-image-preview" src="{{ Storage::url($user->image) }}" alt="Immagine utente">
                        @else
                        <img class="img-account-profile rounded-circle mb-4" id="profile-image-preview" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png" alt="Immagine utente">
                        @endif
                        {{-- !? --}}
                        {{--! bugged <img class="img-account-profile rounded-circle mb-4" id="profile-image-preview" src="{{ Storage::url($user->image ?? 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png') }}" alt="Immagine utente"> --}}
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">Carica un'immagine, MAX: 6MB</div>
                        <!-- Profile picture upload button-->
                        <form action="{{ route('profile.updateImage', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                            <button class="btn btn-primary container-fluid mt-3" type="submit" style="color: whitesmoke; text-decoration: none;">Aggiorna Immagine</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Informazioni Account: {{$user->username}}</div>
                    <div class="card-body">
                        <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="small mb-1" for="username">Username (Come appari agli altri utenti della piattaforma)</label>
                                <input class="form-control" name="username" id="username" type="text" placeholder="Inserisci Nome" value="{{ $user->username }}">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="name">Nome</label>
                                <input class="form-control" name="name" id="name" type="text" placeholder="Inserisci Nome" value="{{ $user->name }}">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="surname">Cognome</label>
                                    <input class="form-control" id="surname" name="surname" type="text" placeholder="Enter your first name" value="{{ $user->surname }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="short_description">Breve Descrizione</label>
                                    <input class="form-control" id="short_description" name="short_description" type="text" placeholder="Breve Biografia" value="{{ $user->short_description }}">
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="company_address">Indirizzo compagnia</label>
                                    <input class="form-control" id="company_address" name="company_address" type="text" placeholder="Indirizzo compagnia" value="{{ $user->company_address }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="email">E-Mail</label>
                                <input class="form-control" name="email" id="email" type="email" placeholder="Enter your email address" value="{{ $user->email }}">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="phone">Telefono</label>
                                    <input class="form-control" name="phone" id="phone" type="tel" placeholder="Enter your phone number" value="{{ $user->phone }}">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Salva modifiche</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    
    @endauth
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('profile-image-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        </script>
</x-layout>

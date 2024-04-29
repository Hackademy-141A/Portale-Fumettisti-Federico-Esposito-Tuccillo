{{-- <x-layout>
    <div class="card text-center ">
        <div class="card-header">
            Dettagli del Profilo
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                <li class=""><strong>Nome:</strong> {{ $user->name }}</li>
                <li><strong>Numero di Telefono:</strong> {{ $user->phone }}</li>
                <li><strong>Indirizzo della Società:</strong> {{ $user->company_address }}</li>
                <!-- Aggiungi altri dettagli del profilo se necessario -->
                <li><strong>Immagine Profilo:</strong> <img src="{{ asset($user->img) }}" alt="Immagine Profilo"></li>
                <li><strong>Breve Descrizione:</strong> 
                    {{ $user->short_description }}</li>
                    
                    <li><a href="{{ route('profile.edit', ['id' => $user->id]) }}">Modifica profilo</a></li>
                </ul>
            </div>
        </div>
    </x-layout>
    --}}
    
    <x-layout>
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="card" style="width: 18rem;">
                <img src="#" class="card-img-top" alt="Immagine Profilo Utente">
                <div class="card-body">
                    <h5 class="card-title">Profilo di  {{$user->name}}</h5>
                    <p class="card-text">Dettagli: </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$user->email}}</li>
                    <li class="list-group-item">{{$user->phone}}</li>
                    <li class="list-group-item">{{$user->company_address}}</li>
                    <li class="list-group-item">{{$user->short_description}}</li>
                </ul>
                <div class="card-body">
                    <a href="{{route('profile.edit', 'id')}}" class="card-link">Modifica il tuo profilo!</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </x-layout>
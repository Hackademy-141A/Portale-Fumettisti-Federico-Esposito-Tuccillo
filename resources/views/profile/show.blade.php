
    
    <x-layout>
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="card" style="width: 18rem;">
                <img src="{{Storage::url($user->image)}}" class="card-img-top" alt="Immagine Profilo Utente">
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
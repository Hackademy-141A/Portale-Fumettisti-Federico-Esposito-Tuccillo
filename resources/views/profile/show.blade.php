{{-- 
    
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
    </x-layout> --}}



        <x-layout>
    
            <div class="header apparaheader sfondoheader">
                <div class="container">
                    <div class="row">
                        <div class="col-12 breadcrumb mt-2 ps-3">
                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="testoheader" href="{{route('profile.overview')}}">Fumettisti</a></li>
                                    <li class="breadcrumb-item active testohSeader" aria-current="page">Overview</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-12 testoheader "><h1>Tutti i Fumettisti</h1></div>
                    </div>
                </div>
            </div>
            
            <div class="my-4">
            <div class="container">
                <div class="row">
                    @foreach ($user as $users) 
                    <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{$user->image ?? 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png'}}" alt="Admin" class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4>{{$user->username}}</h4>
                                            <p class="text-secondary mb-1">{{$user->short_description}}</p>
                                            <form action="{{route('article.index', 'article_id')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button type="submit" class="btn btn-outline-danger mt-3">Vai al dettaglio</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
            
            
            
            
            
        </x-layout>

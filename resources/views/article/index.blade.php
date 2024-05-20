{{-- <x-layout>
    @csrf
    @auth
    
    <style>
        body{
            background-image: url('{{ asset('images/test1.jpg') }}');
            
        }
    </style>
    <div class="container col-12 col-md-4 mt-5">
        <div class="container d-flex justify-content-center align-items-center">
            @if($articles->isEmpty())
            <div class="container bg-light p-2 rounded-4 border-2 border-dark shadow-lg">
                <h1 class="display-5 text-center">Non ci sono ancora articoli al momento!</h1>
                <p class="text-center">Aggiungine uno <a href="{{route('article.create')}}">Qui!</a></p>
            </div>
            
        </div>
        
        @else
        @foreach($articles as $article)
        <div class="card mb-3">
            <img src="#" class="card-img-top" alt="Profile Image">
            <div class="card-body">
                <h5 class="card-title">Titolo: {{ $article->title }}</h5>
                <p class="card-text">Sottotitolo: {{ $article->subtitle }}</p>
                <p class="card-text">Descrizione: {{ $article->article_description }}</p>
                <p class="card-text">ID Autore: {{ $article->author }}</p>
                {{-- Ora Mostreremo la sezione categoria 
                    <p class="card-text">Categoria: {{$article->category->name}}</p>
                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary">Mostra</a>
                    <a href="{{ route('article.edit', $article) }}" class="btn btn-primary">Modifica</a>
                    <!-- Modal trigger button -->
                    <button type="button" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $article->id }}" data-title="{{ $article->title }}">
                        Elimina
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteConfirmationModal{{ $article->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel{{ $article->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel{{ $article->id }}">Conferma Eliminazione</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body bold">
                                    Sei sicuro di voler eliminare questo articolo?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{ route('article.destroy', $article) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        @endauth
    </x-layout>  --}}
    
    <x-layout>
        {{--! Snippet Errori --}}
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="display-1">Tutti i nostri articoli</h1>
                        <div class="row">
                            @foreach ($articles as $article )
                                <div class="col-12 col-md-3 mb-5">
                                    {{-- @dd('$article') --}}
                                    <x-card 
                                    title="{{$article->title}}"
                                    subtitle="{{$article->subtitle}}"
                                    body="{{$article->body}}"
                                    short_description="{{$article->short_description}}"
                                    img="{{$article->image}}"
                                    writer="{{$article->user->name}}"
                                    hrefbyUser="{{route('article.byUser',['user'=>$article->user->id] )}}"
                                    hrefShow="{{route('article.show', compact('article'))}}"
                                    />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </x-layout>
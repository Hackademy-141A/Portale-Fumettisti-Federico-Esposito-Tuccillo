<x-layout>
    @csrf
    @auth
    <div class="container col-12 col-md-4 mt-5">
        <h1 class="display-5">Qui, Vedrai solo i tuoi articoli</h1>

        <div class="card">
            
            <img src="#" class="card-img-top" alt="Profile Image">
            
            <div class="card-body">
                
                <h5 class="card-title">Titolo: {{ $article->title }}</h5>
                
                <p class="card-text">Sottotilo: {{ $article->subtitle }}</p>
                
                <p class="card-text">Descrizione: {{ $article->article_description }}</p>
                
                {{-- <p class="card-text">{{ $articles->article_description }}</p> --}}
                
                <a href="{{ route('article.show','id', $article->id) }}" class="btn btn-primary">Mostra Articolo</a>
                <a href="{{route('article.edit','id', $article->id)}}" class="btn btn-primary">Modifica Il Tuo Articolo!</a>
                
            </div>
            
        </div>
        
    </div>
    
    
    @endauth
</x-layout>

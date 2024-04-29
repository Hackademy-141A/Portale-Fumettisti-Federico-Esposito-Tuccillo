<x-layout>
    @csrf
    @auth
    <div class="container col-12 col-md-4 mt-5">
        @if($articles->isEmpty())
        <h1 class="display-3 text-center ">Non ci sono ancora articoli al momento!</h1>
        <p>Aggiungine uno 
            <a href="{{route('article.create')}}">Qui!
            </a>
        </p>
        @else
        @foreach($articles as $article)
        <div class="card">
            <img src="#" class="card-img-top" alt="Profile Image">
            <div class="card-body">
                <h5 class="card-title">Titolo: {{ $article->title }}</h5>
                <p class="card-text">Sottotitolo: {{ $article->subtitle }}</p>
                <p class="card-text">Descrizione: {{ $article->article_description }}</p>
                <p class="card-text">ID Autore: {{ $article->author }}</p>
                <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary">Mostra Articolo</a>
                <a href="{{ route('article.edit', $article) }}" class="btn btn-primary">Modifica Il Tuo Articolo!</a>
                <form action="{{ route('article.destroy', $article) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger .delete-btn">Elimina Articolo</button>
                </form>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    @endauth
</x-layout>

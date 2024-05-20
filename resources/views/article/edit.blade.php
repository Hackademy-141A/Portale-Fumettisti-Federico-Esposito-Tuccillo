<x-layout>
    @auth
    <div class="card container-fluid d-flex col-12 col-md-4 mt-5">
        <div class="card-header">
            Modifica il tuo Fumetto
        </div>
        <div class="card-body">
            
            
            
            <form action="{{ route('article.update',compact('article')) }}" method="POST" enctype="multipart/form-data">
                {{-- @dd($article); --}}
                
                
                @csrf
                @method('PUT')
                {{-- !Titolo --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$article->title}}">
                </div>
                {{-- !Sottotitolo --}}
                <div class="mb-3">
                    <label for="subtitle" class="form-label">Sottotitolo</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle"
                    value="{{$article->subtitle}}">
                </div>
                {{-- !Corpo --}}
                <div class="mb-3">
                    <label for="article_description" class="form-label">Corpo</label>
                    <textarea class="form-control" id="article_description" name="article_description">{{$article->article_description}}</textarea>
                </div>

                
                <div class="row">{{$article->categories}}</div>

                
                {{-- <div class="mb-3">
                    <label for="img" class="form-label">Immagine</label>
                    <input type="file" class="form-control" id="img" name="img">
                </div> --}}
                {{-- ?Invia --}}
                <button type="submit" class="btn btn-primary">Modifica Fumetto</button>
                
            </form>
        </div>
    </div>
    @endauth
    {{-- !Per Guests --}}
    @guest
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="display-1">Non Puoi Aggiungere fumetti se non sei registrato!</h1>
            </div>
        </div>
    </div>
    @endguest
</x-layout>

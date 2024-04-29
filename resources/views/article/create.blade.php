
    <x-layout>
        @auth
            <div class="card">
                <div class="card-header">
                    Inserisci il tuo Fumetto
                </div>
                <div class="card-body">
                    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
    {{-- !Titolo --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
    {{-- !Sottotitolo --}}
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Sottotitolo</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle">
                        </div>
    {{-- !Corpo --}}
                        <div class="mb-3">
                            <label for="article_description" class="form-label">Corpo</label>
                            <textarea class="form-control" id="article_description" name="article_description"></textarea>
                        </div>
    
                        <div class="mb-3">
                            <label for="img" class="form-label">Immagine</label>
                            <input type="file" class="form-control" id="img" name="img">
                        </div>
    {{-- ?Invia --}}
                        <button type="submit" class="btn btn-primary">Aggiungi Fumetto</button>
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
    
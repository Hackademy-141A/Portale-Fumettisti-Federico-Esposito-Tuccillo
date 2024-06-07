<x-layout>
    <body class="bodywelcome">
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <header class="text-center text-white py-4">
            <div class="container mt-5">
                <h1 class="display-3">Benvenuto Fumettista</h1>
                <p class="lead">Esplora il mondo dei fumetti e porta la tua creatività al livello successivo!</p>
            </div>
        </header>

        <section class="text-center container">
            <div class="row py-lg-1">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h2 class="fw-light">Scrivi un Fumetto</h2>
                    <a href="{{ route('article.create') }}" class="btn btn-primary my-2">Aggiungi Fumetto</a>
                    <a href="{{ route('article.index', 'article') }}" class="btn btn-secondary my-2">Vedi Fumetti</a>
                    <p class="lead">Oppure fai una ricerca</p>
                    <a href="{{ route('article.index', 'article') }}" class="btn btn-secondary my-2">Ricerca Fumetti</a>
                </div>
            </div>
        </section>

        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-4">Ultimi articoli accettati</h2>
                </div>
            </div>
            <div class="row">
                @foreach($articles as $article)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->subtitle }}</p>
                            {{-- Vai al dettaglio --}}
                            <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary">Leggi</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</x-layout>

<x-layout>
    <body class="body-welcome">
        <header class="text-center text-white py-4">
            <div class="container">
                <h1 class="display-5">Benvenuto Fumettista</h1>
                <p class="lead">Esplora il mondo dei fumetti e porta la tua creatività al livello successivo!</p>
            </div>
        </header>
        
        
        <section class="text-center container">
            <div class="row py-lg-1">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Scrivi un Fumetto</h1>
                    <p class="lead">Inserisci il tuo Fumetto</p>
                    <a href="{{ route('article.create') }}" class="btn btn-primary my-2">Aggiungi Fumetto</a>
                    <a href="{{ route('article.index', 'article') }}" class="btn btn-secondary my-2">Vedi Fumetti</a>
                    <p class="lead">Oppure fai una ricerca</p>
                    <a href="{{ route('article.index', 'article') }}" class="btn btn-secondary my-2">Ricerca Fumetti</a>
                </div>
            </div>
            
        </section>
    </body>
</x-layout>
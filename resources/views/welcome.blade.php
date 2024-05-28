<x-layout>
    {{-- <style>
        body{
            margin-top:0;
            background-image: url('{{ asset('images/test11.jpg') }}');
            brightness: 10%!important;
            background-color: rgba(255, 255, 255, 0.8); /* Imposta il colore di sfondo con un'opacità del 80% */
            backdrop-filter: blur(5); /* Applica uno sfondo sfocato */
            background-size: cover;
            background-position: center !important;
            background-repeat: no-repeat !important;
        }
    </style> --}}
    <body class="bodywelcome">
        <header class="text-center text-white py-4">
            <div class="container mt-5">
                <h1 class="display-5">Benvenuto Fumettista</h1>
                <p class="lead">Esplora il mondo dei fumetti e porta la tua creatività al livello successivo!</p>
            </div>
        </header>
        
        
        <section class="text-center container">
            <div class="row py-lg-1">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Scrivi un Fumetto</h1>
                    <a href="{{ route('article.create') }}" class="btn btn-primary my-2">Aggiungi Fumetto</a>
                    <a href="{{ route('article.index', 'article') }}" class="btn btn-secondary my-2">Vedi Fumetti</a>
                    <p class="lead">Oppure fai una ricerca</p>
                    <a href="{{ route('article.index', 'article') }}" class="btn btn-secondary my-2">Ricerca Fumetti</a>
                </div>
            </div>
            
        </section>
    </body>
</x-layout>
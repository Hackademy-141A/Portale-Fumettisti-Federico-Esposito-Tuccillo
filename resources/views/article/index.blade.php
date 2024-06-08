<x-layout>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Source+Code+Pro:200');
        
        body {
            margin: 0;
            padding: 0;
            background-image: url('https://static.pexels.com/photos/414171/pexels-photo-414171.jpeg');
            background-size: cover;
            background-position: top;
            animation: slidein s alternate infinite forwards;
            padding-top:  0;/* Adjust the padding-top instead of margin-top */
        }
        
        @keyframes slidein {
            from {background-position: top; background-size: 3000px;}
            to {background-position: -100px 0px; background-size: 2750px;}
        }
        
        .center {
            display: flex;
            align-items: center;
            justify-content: center;
            /* position: absolute; Remove absolute positioning */
            margin: auto; 
            top: 0; 
            right: 0; 
            bottom: 0; 
            left: 0;
            /* background: rgba(75, 75, 250, 0.3); */
            border-radius: 3px;
            padding: 2px;
            box-sizing: border-box;
            margin-bottom: 0px; /* Add some bottom margin for spacing */
        }
        
        .center h1 {
            text-align: center;
            color: white;
            font-family: 'Source Code Pro', monospace;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        
        .container {
            max-width: 90%;
        }
        
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .col-12.col-md-3 {
            flex: 0 0 100%;
            max-width: 100%;
        }
        
        @media (min-width: 768px) {
            .col-12.col-md-3 {
                flex: 0 0 24%;
                max-width: 24%;
            }
        }
        
        .card {
            margin: 10px;
        }
    </style>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <body>
        
        <div class="center">
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-12">
                        <h1>Tutti i nostri articoli</h1>
                        <div class="container">
                            @php
                            $chunks = $articles->chunk(4);
                            @endphp
        
                            @forelse ($chunks as $chunk)
                                <div class="row">
                                    @foreach ($chunk as $article)
                                        <div class="col-12 col-md-3 mb-5">
                                            <x-card
                                                title="{{ $article->title }}"
                                                subtitle="{{ $article->subtitle }}"
                                                body="{{ $article->article_description }}"
                                                :tags="$article->tags"
                                                img="{{ $article->image }}"
                                                writer="{{ $article->user ? ' ' . $article->user->name : 'Unknown Author' }}"
                                                hrefbyUser="{{ $article->user ? route('article.byUser', ['user' => $article->user->id]) : '#' }}"
                                                hrefShow="{{ route('article.show', ['article' => $article->id]) }}"
                                                href="{{ route('article.show', ['article' => $article->id]) }}"
                                                profile="{{ $article->user ? route('profile.user', ['id' => $article->user->id]) : '#' }}"
                                            />
                                        </div>
                                    @endforeach
                                </div>
                            @empty
                                <p>Nessun articolo trovato.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-layout>

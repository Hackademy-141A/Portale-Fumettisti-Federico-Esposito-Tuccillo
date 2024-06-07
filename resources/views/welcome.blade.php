<x-layout>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .text-container {
            position: relative;
            display: flex;
            justify-content: center;
            background-image: url('{{ asset('images/test1.jpg') }}');
            background-size: cover;
            background-position: center;
            padding-bottom: 700px;
            margin-top: 20px;
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .text-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            z-index: 1;
        }

        .text-container > * {
            position: relative;
            z-index: 2;
        }

        .container-fluid1 {
            position: relative;
            background-size: cover;
            background-position: center;
            border-top: 20px;
            border-radius: 2px;
            background-image: url('{{ asset('images/test11.jpg') }}');
            background-color: #5b5a5a !important;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            font-size: 30px;
            color: #ffffff;
        }

        .work-with-us-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 50px 0;
            background-color: #222;
            color: white;
            text-align: center;
        }

        .work-with-us-container h2 {
            margin-bottom: 20px;
            font-size: 2em;
        }

        .work-with-us-container p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .work-with-us-button {
            padding: 15px 30px;
            font-size: 1.2em;
            color: white!important;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none!important;
        }

        .work-with-us-button:hover {
            background-color: #0056b3;
        }
    </style>

    <body>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="text-container">
            <h1 class="display-1 mt-5">Benvenuti Fumettisti</h1>
        </div>
        
        <div class="container-fluid1">
            <div class="row text-center">
                <div class="col-12">
                    <h1 style="font-family: electrolize" class="mt-5">Ultimi Fumetti Pubblicati</h1>
                    <div class="container py-5">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center mt-5 mb-4">Ultimi articoli accettati</h2>
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
                                        <p>{{$article->user->username}}</p>
                                        <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary">Leggi</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> 
                </div>
            </div>
        </div>

        <div class="work-with-us-container">
            <h2>Anche tu vuoi inserire dei fumetti e iniziare a fare carriera?</h2>

            <a href="{{ route('careers') }}" class="work-with-us-button">Lavora con noi</a>
        </div>
    </body>
</x-layout>
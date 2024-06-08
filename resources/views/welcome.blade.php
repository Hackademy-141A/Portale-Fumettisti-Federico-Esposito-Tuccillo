<x-layout>
    <style>
        /* Reset CSS */
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Global Styles */
        html,body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
            color: #333;
            margin-top: 0px!important;
        }

        /* Header Section */
        .header {
            text-align: center;
            padding: 80px 0;
            /* background-image: url('{{asset('images/test2.jpg')}}'); */
            background-size: cover;
            background-position: center;
            color: white;
            background-color:#333;
        }

        .header h1 {
            font-size: 3.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .header p {
            font-size: 1.2em;
            margin-bottom: 40px;
            max-width: 600px;
            margin: 0 auto;
        }

        .header .btn {
            font-size: 1.2em;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .header .btn:hover {
            background-color: #0056b3;
        }

        /* Latest Comics Section */
        .latest-comics {
            padding: 50px 0;
            background-color: #333;
        }

        .latest-comics h2 {
            font-size: 2.5em;
            color: white;
            text-align: center;
            margin-bottom: 40px;
        }

        .comic-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .comic-card {
            width: 300px;
            margin: 0 15px 30px;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .comic-card:hover {
            transform: translateY(-5px);
        }

        .comic-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .comic-details {
            padding: 20px;
        }

        .comic-title {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;
        }

        .comic-subtitle {
            font-size: 1.2em;
            color: #777;
            margin-bottom: 15px;
        }

        .comic-author {
            font-size: 1em;
            color: #555;
            margin-bottom: 5px;
        }

        .comic-btn {
            display: block;
            width: 100%;
            padding: 10px 0;
            background-color: #007bff;
            color: white;
            text-align: center;
            text-decoration: none;
            border: none;
            border-top: 1px solid #ddd;
            border-radius: 0 0 10px 10px;
            transition: background-color 0.3s ease;
        }

        .comic-btn:hover {
            background-color: #0056b3;
        }

        /* Work With Us Section */
        .work-with-us {
            text-align: center;
            padding: 80px 0;
            background-color: #222;
            color: white;
        }

        .work-with-us h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .work-with-us p {
            font-size: 1.2em;
            margin-bottom: 40px;
            max-width: 600px;
            margin: 0 auto;
        }

        .work-with-us .btn {
            font-size: 1.2em;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .work-with-us .btn:hover {
            background-color: #0056b3;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .comic-card {
                width: calc(50% - 30px);
            }
        }

        @media screen and (max-width: 576px) {
            .comic-card {
                width: calc(100% - 30px);
                margin: 0 0 30px;
            }
        }
    </style>

    <body>
        <!-- Header Section -->
        <section class="header">
            <div class="container">
                <h1>Benvenuti Fumettisti</h1>
                <p>Esplora il mondo dei fumetti e scopri le ultime novità!</p>
                <a href="{{ route('article.index', 'article') }}" class="btn">Visualizza tutti i fumetti</a>
                <a href="{{ route('article.create') }}" class="btn">Aggiungi un nuovo fumetto</a>
            </div>
        </section>

        <!-- Latest Comics Section -->
        <section class="latest-comics">
            <div class="container">
                <h2>Ultimi Fumetti Pubblicati</h2>
                <div class="comic-list">
                    @foreach($articles as $article)
                    <div class="comic-card">
                        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="comic-img">
                        <div class="comic-details">
                            <h3 class="comic-title">{{ $article->title }}</h3>
                            <p class="comic-subtitle">{{ $article->subtitle }}</p>
                            <p class="comic-author">Autore: {{$article->user->username}}</p>
                            <a href="{{ route('article.show', $article->id) }}" class="comic-btn">Leggi</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Work With Us Section -->
        <section class="work-with-us">
            <div class="container">
                <h2>Anche tu vuoi inserire dei fumetti e iniziare a fare carriera?</h2>
                <p>Unisciti a noi e inizia a pubblicare i tuoi fumetti!</p>
                <a href="{{ route('careers') }}" class="btn">Lavora con noi</a>
            </div>
        </section>
    </body>
</x-layout>

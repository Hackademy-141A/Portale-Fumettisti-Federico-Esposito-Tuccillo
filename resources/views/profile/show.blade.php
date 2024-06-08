<x-layout>
    <body>
        <div class="container custom-margin-top">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="{{ Storage::url($user->image) }}" class="card-img-top" alt="User Image">
                        <div class="card-body text-center">
                            <h3 class="card-title">{{ $user->name }} {{ $user->surname }}</h3>
                            <br>
                            <h4 class="card-subtitle text-muted">{{ $user->username }}</h4>
                            <p class="card-text">{{ $user->short_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">Informazioni di contatto</h4>
                            <ul class="list-unstyled">
                                <li><strong style="color: red;">Username: </strong> {{$user->username}} </li>
                                <li><strong style="color: red;">Nome: </strong>{{$user->name}}</li>
                                <li><strong style="color: red;">Indirizzo Aziendale:</strong> {{ $user->company_address }}</li>
                                <li><strong style="color: red;">Email:</strong> {{ $user->email }}</li>
                                <li><strong style="color: red;">Telefono:</strong> {{ $user->phone }}</li>
                            </ul>
                            <hr>
                            <h4 class="card-title">Social Media</h4>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ $user->github }}" target="_blank" class="btn btn-outline-dark">
                                        <i class="fab fa-github"></i> GitHub
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $user->instagram }}" target="_blank" class="btn btn-outline-danger">
                                        <i class="fab fa-instagram"></i> Instagram
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ $user->x }}" target="_blank" class="btn btn-outline-primary">
                                        <i class="fab fa-twitter"></i> X
                                    </a>
                                </li>
                            </ul>
                            <hr>
                            <p class="text-muted">Membro Dal: {{ $user->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h4 class="display-6">Articoli</h4>
                    <select id="categorySelect" class="form-select mt-3" onchange="filterArticles()">
                        <option value="all">Tutte le categorie</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div id="noArticlesMessage" class="alert alert-info mt-3" style="display: none;">
                        Nessun articolo disponibile per questa categoria.
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container mt-5">
            <div class="row" id="articlesContainer">
                @forelse ($user->articles as $article)
                <div class="col-md-4 mb-4 article-item" data-category="{{ $article->category_id }}">
                    <div class="card shadow-sm">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="Article Image">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary">Vedi Articolo</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="alert alert-info" role="alert">
                        Nessun articolo aggiunto ancora.
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <script>
            function filterArticles() {
                const selectedCategory = document.getElementById('categorySelect').value;
                const articles = document.querySelectorAll('.article-item');
                let articlesFound = false;

                articles.forEach(article => {
                    if (selectedCategory === 'all' || article.dataset.category === selectedCategory) {
                        article.style.display = 'block';
                        articlesFound = true;
                    } else {
                        article.style.display = 'none';
                    }
                });

                if (!articlesFound) {
                    document.getElementById('noArticlesMessage').style.display = 'block';
                } else {
                    document.getElementById('noArticlesMessage').style.display = 'none';
                }
            }
        </script>
    </body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
        
        body {
            background-color: rgb(58, 71, 145);
            font-family: 'Roboto', sans-serif;
        }

        /* .custom-margin-top {
            margin-top: 50px!important; /* Adjust this value as needed */
        } */

        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }

        .card img {
            height: auto;
            width: 100%;
            transition: transform 0.3s;
        }

        .card img:hover {
            transform: scale(1.05);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.2rem;
            margin-top: 10px;
            margin-bottom: 0;
            font-weight: 500;
        }

        .card-subtitle {
            margin-bottom: 10px;
        }

        .text-muted {
            font-size: 0.9rem;
        }

        .btn {
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn:hover {
            transform: translateY(-3px);
        }

        .btn-primary {
            background-color: #4a90e2;
            border-color: #4a90e2;
        }

        .btn-primary:hover {
            background-color: #357abd;
            border-color: #357abd;
        }
    </style>
</x-layout>

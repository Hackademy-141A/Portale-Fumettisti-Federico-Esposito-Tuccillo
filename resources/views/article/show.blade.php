<x-layout>
    <style>
        navbar {
            font-family: 'Pacifico', cursive;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .container {
            max-width: 800px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin: 20px;
        }
        
        .article-header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .article-title {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }
        
        .article-subtitle {
            font-size: 24px;
            font-weight: 500;
            color: #555;
            margin-bottom: 20px;
        }
        
        .article-info {
            font-size: 16px;
            color: #777;
            margin-bottom: 20px;
        }
        
        .article-img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 20px;
        }
        
        .article-description {
            font-size: 18px;
            line-height: 1.6;
            color: #444;
            margin-bottom: 20px;
        }
        
        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        
        .btn {
            padding: 12px 24px;
            text-transform: uppercase;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            background-color: #007bff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
    
    <div class="container">
        <div class="article-header">
            <h2 class="article-title">Articolo: {{ $article->title }}</h2>
            <h3 class="article-subtitle">Categoria: {{ $article->category->name }}</h3>
        </div>
        
        <div class="article-info">
            <p><strong>Numero del fumetto:</strong> {{ $article->comic_number }}</p>
            <p><strong>Anno del fumetto:</strong> {{ $article->comic_year }}</p>
            <p><strong>Autore:</strong> {{ $article->user ? $article->user->name : 'Autore Sconosciuto' }}</p>
            <p><strong>Creazione:</strong> {{ $article->created_at }}</p>
        </div>
        
        <img class="article-img" src="{{ Storage::url($article->image) }}" alt="">
        
        <div class="article-description">
            {{ $article->article_description }}
        </div>
        
        <div class="btn-container">
            @if (isset($article->user))
            <a class="btn" href="{{ route('article.byUser', ['user' => $article->user->id]) }}">Leggi di più</a>
            @endif
            
            @auth
            @if (Auth::id() == $article->author_id)
            <a class="btn" href="{{ route('article.edit', compact('article')) }}">Modifica</a>
            <form method="POST" action="{{ route('article.destroy', compact('article')) }}">
                @csrf
                @method('DELETE')
                <button class="btn" type="submit">Elimina Articolo</button>
            </form>
            @endif
            @endauth
        </div>
    </div>
</x-layout>

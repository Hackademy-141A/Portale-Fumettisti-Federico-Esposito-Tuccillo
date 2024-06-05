<x-layout>
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .card {
            margin-top: 50px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 15px;
            font-size: 1.5rem;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .form-label {
            font-weight: bold;
            color: #495057;
        }
        
        .form-control {
            border-radius: 10px;
        }
        
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: bold;
        }
        
        .btn-primary:hover {
            background-color: #0056b3;
        }
        
        .display-1 {
            font-size: 2.5rem;
            margin-top: 50px;
            color: #495057;
        }
        
        .live-preview img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        @media (min-width: 992px) {
            .card {
                display: flex;
                align-items: stretch;
            }
            
            .card-body {
                flex: 1;
                padding-left: 40px; /* Aggiunto spazio tra il form e l'anteprima dell'immagine */
            }
            
            .live-preview {
                flex: 1;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            
            .live-preview img {
                width: auto;
                max-height: 400px;
            }
        }
    </style>
    
    @auth
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Modifica il tuo Fumetto
                    </div>
                    <div class="card-body">
                        <form action="{{ route('article.update', compact('article')) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        {{-- Titolo --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="title" name="title" value="{{ $article->title }}">
                        </div>
                        
                        {{-- Sottotitolo --}}
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Sottotitolo</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle"
                            value="{{ $article->subtitle }}">
                        </div>
                        
                        {{-- Corpo --}}
                        <div class="mb-3">
                            <label for="article_description" class="form-label">Corpo</label>
                            <textarea class="form-control" id="article_description"
                            name="article_description">{{ $article->article_description }}</textarea>
                        </div>
                        
                        {{-- Immagine --}}
                        <div class="mb-3">
                            <label for="img" class="form-label">Immagine</label>
                            <input type="file" class="form-control" id="img" name="img"
                            onchange="previewImage()">
                        </div>
                        
                        {{-- Categoria --}}
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Categoria</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $article->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            {{-- Tags --}}
                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags (separati da virgola)</label>
                                <input type="text" class="form-control" id="tags" name="tags" value="{{ $article->tags->pluck('name')->implode(',') }}">
                            </div>
                            
                            {{-- Numero Fumetto --}}
                            <div class="mb-3">
                                <label for="comic_number" class="form-label">Numero Fumetto</label>
                                <input type="text" class="form-control" id="comic_number" name="comic_number"
                                value="{{ $article->comic_number }}">
                            </div>
                            
                            {{-- Anno Fumetto --}}
                            <div class="mb-3">
                                <label for="comic_year" class="form-label">Anno Fumetto</label>
                                <input type="text" class="form-control" id="comic_year" name="comic_year"
                                value="{{ $article->comic_year }}">
                            </div>
                            
                            {{-- Invia --}}
                            <button type="submit" class="btn btn-primary">Modifica Fumetto</button>
                        </form>
                    </div>
                    <div class="live-preview">
                        <img id="imagePreview" src="{{ Storage::url($article->image) }}" alt="Anteprima Immagine">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
    
    {{-- Per Guests --}}
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

<script>
    function previewImage() {
        const preview = document.querySelector('#imagePreview');
        const fileInput = document.querySelector('#img');
        const file = fileInput.files[0];
        const reader = new FileReader();
        
        reader.addEventListener('load', function () {
            preview.src = reader.result;
        }, false);
        
        if (file) {
            reader.readAsDataURL(file);
        }
    }
    
</script>

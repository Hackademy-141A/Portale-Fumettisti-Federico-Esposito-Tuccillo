<x-layout> 
    <style>
        body {
            background-image: url('{{ asset('images/test1.jpg') }}');
            background-repeat: no-repeat!important;
            background-size: cover!important;
            background-position: center!important;
            background-attachment: fixed!important;
            overflow: hidden!important;
        }
        .card-body {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5);
            border-radius: 20px;
            padding: 20px;
        }
    </style>
    @auth
    
    <div class="container col-md-4 mt-5">
        <div class="card-body">
            <div class="card-header text-center">
                Inserisci il tuo Fumetto
            </div>
            <div class="card-body">
                <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- Titolo --}}
                    <div class="mb-3 text-center">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title" >
                    </div>
                    {{-- Sottotitolo --}}
                    <div class="mb-3 text-center">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle">
                    </div>
                    {{-- Corpo --}}
                    <div class="mb-3 text-center">
                        <label for="article_description" class="form-label">Corpo</label>
                        <textarea class="form-control" id="article_description" name="article_description" ></textarea>
                    </div>
                    
                    {{-- Categoria --}}
                    <div class="mb-3 text-center">
                        <label for="category_id" class="form-label">Categoria: </label>
                        <select name="category_id" id="category_id" class="form-control text-capitalize" >
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    {{-- Immagine --}}
                    <div class="mb-3">
                        <label for="img" class="form-label">Immagine</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                    
                    {{-- Invia --}}
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Aggiungi Fumetto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @endauth
    
    {{-- Per Gli Ospiti --}}
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
